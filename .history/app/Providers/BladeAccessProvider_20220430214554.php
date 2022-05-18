<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\Admin;

class BladeAccessProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('hasRole', function ($role) {
            if(Auth::user()) {
                if(Auth::user()->hasRole($role)) {
                    return true;
                }
            }
            return false;
        });
    }
}