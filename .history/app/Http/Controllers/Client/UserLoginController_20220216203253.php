<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public $data = []; 
    // Authentication
    public function handleLogin(Request $request) {
        $rules = [
            'user_email' => 'required',
            'user_password' => 'required'
        ];
        $message = [
            'user_email.required' => 'Hãy nhập vào Email',
            'user_password.required' => 'Hãy nhập vào Password'
        ];
        $request->validate($rules, $message);
        $data = [
            'email' => $request->user_email,
            'password' => $request->user_password,
        ];

        // dd(Auth::guard('userin'));

        if (Auth::attempt($data, $request->has('remember'))) {
            $this->data['title'] = 'Trang chủ';
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            $this->data['title'] = 'Đăng nhập';
            return redirect()->back()->with('error', 'Lỗi! Bạn nhập sai Email hoặc Password');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect()->route('home');
    }
}
