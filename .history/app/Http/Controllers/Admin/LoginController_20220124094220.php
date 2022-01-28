<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public $data = []; 
    // Form login
    public function login() {
        $this->data['title'] = 'Đăng nhập';

        return view('admin.users.login', $this->data);
    }
    // Authentication
    public function handleLogin(Request $request) {
        $rules = [
            'adm_email' => 'required',
            'adm_password' => 'required'
        ];
        $message = [
            'adm_email.required' => 'Hãy nhập vào Email',
            'adm_password.required' => 'Hãy nhập vào Password'
        ];
        $request->validate($rules, $message);
        $data = [
            'email' => $request->adm_email,
            'password' => $request->adm_password,
        ];

        dd($request);

        if (Auth::guard('admin')->attempt($data)) {
            $this->data['title'] = 'Dashboard';
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        } else {
            $this->data['title'] = 'Đăng nhập';
            return redirect()->back();
        }

        // dd($request);
        // if (Auth::guard('admin')->attempt(['email' => $request->adm_email, 'password' => $request->adm_password])) {
        //     $this->data['title'] = 'Dashboard';
        //     $request->session()->regenerate();

        //     // return redirect()->intended('admin/products')->with('title', 'Dashboard');
        //     // return view('admin.users.dashboard', $this->data);
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect()->route('admin.login');
    }
}
