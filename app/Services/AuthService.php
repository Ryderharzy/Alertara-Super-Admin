<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthService
{
    private static $authenticatedUser = null;

    /**
     * Validate user token via API endpoint
     */
    public static function validateToken($token = null)
    {
        // Return cached user if already validated in this request
        if (self::$authenticatedUser !== null) {
            return self::$authenticatedUser;
        }

        // If no token provided, try to get from session or request
        if (!$token) {
            $token = session('jwt_token');
        }

        // No token available
        if (!$token) {
            return null;
        }

        // Check if token was issued before logout
        $lastLogoutTime = Cache::get('user_logout_' . ($token), null);
        if ($lastLogoutTime) {
            Log::debug('Token has been invalidated due to logout');
            return null;
        }

        try {
            // Call the authentication API endpoint
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('AUTH_API_TOKEN'),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->timeout(10)->get(env('AUTH_API_ENDPOINT'), [
                'token' => $token,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                if ($data['authenticated'] ?? false) {
                    $userData = $data['user'] ?? [];

                    // Format user data
                    self::$authenticatedUser = [
                        'id' => $userData['id'] ?? null,
                        'email' => $userData['email'] ?? null,
                        'department' => $userData['department'] ?? '',
                        'department_name' => $userData['department_name'] ?? self::getDepartmentName($userData['department'] ?? ''),
                        'role' => $userData['role'] ?? 'user',
                        'exp' => $userData['exp'] ?? (time() + 3600),
                        'iat' => $userData['iat'] ?? time(),
                    ];

                    // Store token in session for subsequent requests
                    session(['jwt_token' => $token]);
                    session()->save();

                    Log::debug('JWT token validated via API', [
                        'email' => self::$authenticatedUser['email'],
                        'role' => self::$authenticatedUser['role'],
                    ]);

                    return self::$authenticatedUser;
                }
            }

            Log::warning('API authentication failed', [
                'status' => $response->status(),
                'response' => $response->json(),
            ]);

            return null;

        } catch (\Exception $e) {
            Log::error('Authentication API error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get current authenticated user
     */
    public static function getCurrentUser()
    {
        return self::$authenticatedUser ?? session('authenticated_user');
    }

    /**
     * Get user email
     */
    public static function getUserEmail()
    {
        $user = self::getCurrentUser();
        return $user['email'] ?? null;
    }

    /**
     * Get user role
     */
    public static function getUserRole()
    {
        $user = self::getCurrentUser();
        return $user['role'] ?? 'guest';
    }

    /**
     * Get user department
     */
    public static function getUserDepartment()
    {
        $user = self::getCurrentUser();
        return $user['department'] ?? '';
    }

    /**
     * Get department name
     */
    public static function getDepartmentName($dept = null)
    {
        if (!$dept) {
            $dept = self::getUserDepartment();
        }

        $names = [
            'law_enforcement_department' => 'Law Enforcement Department',
            'traffic_and_transport_department' => 'Traffic & Transport Department',
            'fire_and_rescue_department' => 'Fire & Rescue Department',
            'emergency_response_department' => 'Emergency Response Department',
            'community_policing_department' => 'Community Policing Department',
            'crime_data_department' => 'Crime Data Analytics Department',
            'public_safety_department' => 'Public Safety Department',
            'health_and_safety_department' => 'Health & Safety Department',
            'disaster_preparedness_department' => 'Disaster Preparedness Department',
            'emergency_communication_department' => 'Emergency Communication Department',
            'all_departments' => 'All Departments',
        ];

        // For super admin with no specific department
        if (self::isSuperAdmin() && empty($dept)) {
            return 'All Departments';
        }

        return $names[$dept] ?? ucfirst(str_replace('_', ' ', $dept));
    }

    /**
     * Check if user is super admin
     */
    public static function isSuperAdmin()
    {
        return self::getUserRole() === 'super_admin';
    }

    /**
     * Check if user is admin
     */
    public static function isAdmin()
    {
        return self::getUserRole() === 'admin';
    }

    /**
     * Check if user is authenticated
     */
    public static function isAuthenticated()
    {
        return self::getCurrentUser() !== null;
    }

    /**
     * Logout user
     */
    public static function logout()
    {
        $user = self::getCurrentUser();

        if ($user && isset($user['id'])) {
            // Store logout timestamp in cache to invalidate future tokens
            Cache::put('user_logout_' . $user['id'], time(), 86400 * 7); // 7 days
        }

        session(['user_logged_out' => true]);
        session()->save();
        session()->forget('jwt_token');
        session()->invalidate();

        Log::info('User logged out');
    }

    /**
     * Get logout URL
     */
    public static function getLogoutUrl()
    {
        return env('MAIN_DOMAIN', 'https://alertaraqc.com') . '/logout';
    }
}