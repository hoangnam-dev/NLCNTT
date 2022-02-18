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
        // dd(bcrypt($request->user_password));
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
            // 'password' => bcrypt($request->user_password),
            'password' => $request->user_password,
        ];

        if (Auth::attempt($data)) {
            $this->data['title'] = 'Trang chủ oke';
            $request->session()->regenerate();
            return redirect()->route('home');
            // return 'dang nhap thanh cong';
        } else {
            $this->data['title'] = 'Fail';
            return redirect()->back()->with('error', 'Lỗi! Bạn nhập sai Email hoặc Password');
            // return 'dang nhap khong thanh cong';

        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect()->route('home');
    }
}
