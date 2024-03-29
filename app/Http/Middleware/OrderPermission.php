<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderPermission
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
        if (Auth::guard('admin')->check()) {
            $admin = Admin::where('manv', Auth::guard('admin')->user()->manv)->first();
            if($admin->hasAnyRole(['admin', 'handleOrders'])) {
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
