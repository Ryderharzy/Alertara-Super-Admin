<?php

if (!function_exists('getCurrentUser')) {
    function getCurrentUser()
    {
        return session('auth_user') ?? null;
    }
}

if (!function_exists('getUserEmail')) {
    function getUserEmail()
    {
        return session('auth_user.email') ?? null;
    }
}

if (!function_exists('getUserRole')) {
    function getUserRole()
    {
        return session('auth_user.role') ?? null;
    }
}

if (!function_exists('getUserDepartment')) {
    function getUserDepartment()
    {
        return session('auth_user.department') ?? null;
    }
}

if (!function_exists('getDepartmentName')) {
    function getDepartmentName($dept = null)
    {
        if ($dept === null) {
            return session('auth_user.department_name') ?? null;
        }
        return $dept;
    }
}

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        return session('auth_user.role') === 'super_admin';
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        return in_array(session('auth_user.role'), ['super_admin', 'admin']);
    }
}

if (!function_exists('isAuthenticated')) {
    function isAuthenticated()
    {
        return session('auth_user') !== null;
    }
}

if (!function_exists('authUrl')) {
    /**
     * Generate URL for authenticated pages
     */
    function authUrl($routeName, $parameters = [])
    {
        return route($routeName, $parameters);
    }
}

if (!function_exists('getTokenRefreshScript')) {
    /**
     * Get token refresh script for JWT management
     */
    function getTokenRefreshScript()
    {
        $token = session('jwt_token');
        if (!$token) {
            return '';
        }

        return '<script>
            // Token management for JWT authentication
            document.addEventListener("DOMContentLoaded", function() {
                // Add token to all AJAX requests
                $.ajaxSetup({
                    headers: {
                        "Authorization": "Bearer ' . $token . '"
                    }
                });
            });
        </script>';
    }
}
