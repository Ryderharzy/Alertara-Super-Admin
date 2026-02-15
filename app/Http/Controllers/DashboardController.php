<?php

namespace App\Http\Controllers;

use App\Models\CrimeIncident;
use App\Models\CrimeAlert;
use App\Services\AuthService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Get authenticated user data based on environment
     */
    private function getAuthUser()
    {
        $environment = app()->environment();
        $currentUser = null;
        $userEmail = '';
        $userRole = '';
        $userDepartment = '';
        $departmentName = '';

        if ($environment === 'local') {
            // Use Laravel's built-in authentication in local environment
            if (!auth()->check()) {
                return null;
            }

            $currentUser = auth()->user();
            $userEmail = $currentUser->email ?? '';
            $userRole = $currentUser->role ?? 'user';
            $userDepartment = $currentUser->department ?? '';
            $departmentName = ucfirst($userDepartment) . ' Department';
        } else {
            // Use JWT authentication in production
            // Validate the JWT token via API
            $currentUser = AuthService::validateToken();

            if (!$currentUser) {
                return null;
            }

            $userEmail = $currentUser['email'] ?? '';
            $userRole = $currentUser['role'] ?? 'user';
            $userDepartment = $currentUser['department'] ?? '';
            $departmentName = $currentUser['department_name'] ?? ucfirst(str_replace('_', ' ', $userDepartment));
        }

        return [
            'currentUser' => $currentUser,
            'userEmail' => $userEmail,
            'userRole' => $userRole,
            'userDepartment' => $userDepartment,
            'departmentName' => $departmentName
        ];
    }
    
    public function index(Request $request)
    {
        // If token is in query parameter, store it and redirect without the token
        if ($request->query('token')) {
            session(['jwt_token' => $request->query('token')]);
            session()->save();

            // Redirect to clean URL without the token parameter
            return redirect()->route('dashboard');
        }

        // Get authenticated user data
        $authData = $this->getAuthUser();
        if (!$authData) {
            return redirect('https://login.alertaraqc.com');
        }
        
        extract($authData);
        // Total Incidents
        $totalIncidents = CrimeIncident::count();

        // Total Cleared/Uncleared
        $clearedIncidents = CrimeIncident::where('clearance_status', 'cleared')->count();
        $unclearedIncidents = CrimeIncident::where('clearance_status', 'uncleared')->count();
        $clearanceRate = $totalIncidents > 0 ? round(($clearedIncidents / $totalIncidents) * 100, 2) : 0;

        // Active Alerts
        $activeAlerts = CrimeAlert::where('alert_status', 'active')->count();

        // Incidents by Category
        $incidentsByCategory = CrimeIncident::select('crime_category_id', DB::raw('COUNT(*) as count'))
            ->with('category')
            ->groupBy('crime_category_id')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        $categoryLabels = $incidentsByCategory->map(fn($item) => $item->category->category_name ?? 'Unknown')->toArray();
        $categoryData = $incidentsByCategory->map(fn($item) => $item->count)->toArray();

        // Monthly Trends (Last 12 months)
        $monthlyTrends = CrimeIncident::select(
            DB::raw('DATE_FORMAT(incident_date, "%Y-%m") as month'),
            DB::raw('COUNT(*) as count')
        )
            ->where('incident_date', '>=', Carbon::now()->subMonths(12))
            ->groupBy(DB::raw('DATE_FORMAT(incident_date, "%Y-%m")'))
            ->orderBy('month')
            ->get();

        $monthLabels = $monthlyTrends->map(fn($item) => $item->month)->toArray();
        $monthData = $monthlyTrends->map(fn($item) => $item->count)->toArray();

        // Crime Status Distribution
        $statusDistribution = CrimeIncident::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        $statusLabels = $statusDistribution->map(fn($item) => ucfirst($item->status))->toArray();
        $statusData = $statusDistribution->map(fn($item) => $item->count)->toArray();

        // Top Barangays by Incidents
        $topBarangays = CrimeIncident::select('barangay_id', DB::raw('COUNT(*) as count'))
            ->with('barangay')
            ->groupBy('barangay_id')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        $barangayLabels = $topBarangays->map(fn($item) => $item->barangay->barangay_name ?? 'Unknown')->toArray();
        $barangayData = $topBarangays->map(fn($item) => $item->count)->toArray();

        // Recent Incidents (Last 10)
        $recentIncidents = CrimeIncident::with('category', 'barangay')
            ->orderByDesc('incident_date')
            ->limit(10)
            ->get();

        // Severity Distribution (from alerts)
        $severityDistribution = CrimeAlert::select('severity', DB::raw('COUNT(*) as count'))
            ->groupBy('severity')
            ->get();

        $severityLabels = $severityDistribution->map(fn($item) => ucfirst($item->severity))->toArray();
        $severityData = $severityDistribution->map(fn($item) => $item->count)->toArray();

        // Latest Alerts
        $latestAlerts = CrimeAlert::with('barangay', 'category')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('dashboard', [
            'totalIncidents' => $totalIncidents,
            'clearedIncidents' => $clearedIncidents,
            'unclearedIncidents' => $unclearedIncidents,
            'clearanceRate' => $clearanceRate,
            'activeAlerts' => $activeAlerts,
            'recentIncidents' => $recentIncidents,
            'latestAlerts' => $latestAlerts,
            // User data from JWT authentication
            'currentUser' => $currentUser,
            'userEmail' => $userEmail,
            'userRole' => $userRole,
            'userDepartment' => $userDepartment,
            'departmentName' => $departmentName,
            // Chart data
            'categoryLabels' => json_encode($categoryLabels),
            'categoryData' => json_encode($categoryData),
            'monthLabels' => json_encode($monthLabels),
            'monthData' => json_encode($monthData),
            'statusLabels' => json_encode($statusLabels),
            'statusData' => json_encode($statusData),
            'barangayLabels' => json_encode($barangayLabels),
            'barangayData' => json_encode($barangayData),
            'severityLabels' => json_encode($severityLabels),
            'severityData' => json_encode($severityData),
            'clearanceLabels' => json_encode(['Cleared', 'Uncleared']),
            'clearanceChartData' => json_encode([$clearedIncidents, $unclearedIncidents]),
        ]);
    }
}
