<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public $data = []; 

    // Form login
    public function loginForm() {
        $this->data['title'] = 'Đăng nhập';

        return view('client.users.login', $this->data);
    }

    // Authentication
    public function handleLogin(Request $request) {
        // dd($request);
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
            // return redirect()->route('home');
            return redirect()->route('home')->response()->json_encode(['error'=> 1, 'message'=>'Login Success']);
            // return redirect()->route('home')->with('result', json_encode(['error'=> 1, 'message'=>'Login Success']));
        } else {
            $this->data['title'] = 'Fail';
            // return redirect()->back()->with('error', 'Lỗi! Bạn nhập sai Email hoặc Password');
            return redirect()->back()->response()->json_encode( ['error'=>0, 'message'=>'Login Fail']);
            // return redirect()->route('home')->with('result', json_encode( ['error'=>0, 'message'=>'Login Fail']));

        }
    }

        // Form register
        public function registerForm() {
            $this->data['title'] = 'Đăng ký';
    
            return view('client.users.register', $this->data);
        }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect()->route('home');
    }
}
