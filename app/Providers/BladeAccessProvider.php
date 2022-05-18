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
        Blade::if('hasRole', function ($roles) {
            if(Auth::guard('admin')->check()) {
                $admin = Admin::where('manv', Auth::guard('admin')->user()->manv)->first();
                if($admin->hasAnyRole($roles)) {
                    return true;
                }
            }
            return false;
        });
    }
}
