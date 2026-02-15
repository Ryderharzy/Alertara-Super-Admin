<?php

namespace App\Helpers;

use App\Services\AuthService;

if (!function_exists('getCurrentUser')) {
    function getCurrentUser()
    {
        return AuthService::getCurrentUser();
    }
}

if (!function_exists('getUserEmail')) {
    function getUserEmail()
    {
        return AuthService::getUserEmail();
    }
}

if (!function_exists('getUserRole')) {
    function getUserRole()
    {
        return AuthService::getUserRole();
    }
}

if (!function_exists('getUserDepartment')) {
    function getUserDepartment()
    {
        return AuthService::getUserDepartment();
    }
}

if (!function_exists('getDepartmentName')) {
    function getDepartmentName($dept = null)
    {
        return AuthService::getDepartmentName($dept);
    }
}

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        return AuthService::isSuperAdmin();
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        return AuthService::isAdmin();
    }
}

if (!function_exists('isAuthenticated')) {
    function isAuthenticated()
    {
        return AuthService::isAuthenticated();
    }
}

if (!function_exists('authUrl')) {
    /**
     * Generate URL for authenticated pages with JWT token
     */
    function authUrl($routeName, $parameters = [])
    {
        $url = route($routeName, $parameters);
        $token = session('jwt_token');

        if ($token) {
            $separator = strpos($url, '?') !== false ? '&' : '?';
            $url .= $separator . 'token=' . urlencode($token);
        }

        return $url;
    }
}
