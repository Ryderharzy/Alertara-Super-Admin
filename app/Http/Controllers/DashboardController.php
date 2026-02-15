<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

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

        return view('dashboard', $authData);
    }
}
