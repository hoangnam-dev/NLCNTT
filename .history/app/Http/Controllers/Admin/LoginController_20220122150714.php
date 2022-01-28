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
        // dd($request);
        if (Auth::guard('admin')->attempt(['email' => $request->adm_email, 'password' => $request->adm_password])) {
            $this->data['title'] = 'Dashboard';
            // $request->session();

            return redirect()->intended('.dashboard')->with('title', 'Dashboard');
            // return view('admin.users.dashboard', $this->data);
            // return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('notify','Đăng nhập không thành công');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
