<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load auth helper functions
        require_once app_path('Helpers/AuthHelper.php');
    }
}
