<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        dd(Auth::guard('admin')->user()->manv);
        if (Auth::guard('admin')->check()) {
            $admin = Admin::where('manv', Auth::guard('admin')->user()->manv)->first();
            dd($admin);
            if($admin->hasAnyRole(['admin', 'handleProduct'])) {
                return $next($request);
            }
            else {
                return redirect()->route('admin.dashboard');
            }
        }
        else {
            return redirect()->route('admin.login');
        }
    }
}