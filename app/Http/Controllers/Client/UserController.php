<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
            $this->data['title'] = 'Trang chủ';
            $request->session()->regenerate();
            return redirect()->route('home');
            // return redirect()->route('home')->response()->json_encode(['error'=> 1, 'message'=>'Login Success']);
            // return redirect()->route('home')->with('result', json_encode(['error'=> 1, 'message'=>'Login Success']));
        } else {
            // $this->data['title'] = 'Fail';
            return redirect()->back()->with('error', 'Lỗi! Bạn nhập sai Email hoặc Password');
            // return redirect()->back()->response()->json_encode( ['error'=>0, 'message'=>'Login Fail']);
            // return redirect()->route('home')->with('result', json_encode( ['error'=>0, 'message'=>'Login Fail']));

        }
    }

    // Form register
    public function registerForm() {
        $this->data['title'] = 'Đăng ký';

        return view('client.users.register', $this->data);
    }

    // Insert user to database
    public function handleRegister(Request $request) {
        $rules = [
            'user_name' => 'required',
            'user_phone' => 'required|min:10',
            // 'user_email' => 'email:filter',
            'user_password' => 'required',
            'user_address' => 'required',
        ];

        $message = [
            'user_name.required' => 'Tên khách hàng không được để trống',
            'user_phone.required' => 'Số điện thoại không được để trống',
            'user_phone.min' => 'Số điện thoại gồm :min ký tự',
            // 'user_email.email' => 'Hãy nhập vào một Email',
            'user_password.required' => 'Mật khẩu đăng nhập không được trống',
            'user_address.required' => 'Địa chỉ không được trống',
        ];
        $request->validate($rules, $message);

        $userModel = new Customers();
        $userModel->tenkh = $request->user_name;
        $userModel->sodienthoai = $request->user_phone;
        $userModel->email = $request->user_email;
        $userModel->password = bcrypt($request->user_pass);
        $userModel->gioitinh = !empty($request->user_gender)?$request->user_gender:1;
        $userModel->create_at = date('Y-m-d H:i:s');
        if($userModel->save()) {
            return redirect()->back()->with('status', 'success')->with('message', 'Đăng ký thành công');
        }
        else {
            return redirect()->back()->with('status', 'danger')->with('message', 'Đăng ký không thành công');
        }

    }
    // Form edit user
    public function edit(Request $request) {
        $this->data['title'] = 'Cập nhật khách hàng';
        $this->data['user'] = Customers::find($request->makh);

        return view('admin.Customers.edit', $this->data);
    }
    // Update user to database
    public function update(Request $request) {
        $rules = [
            'user_name' => 'required',
            'user_phone' => 'required|min:10',
            // 'user_email' => 'email:filter',
            'user_pass' => 'required',
        ];

        $message = [
            'user_name.required' => 'Tên khách hàng không được để trống',
            'user_phone.required' => 'Số điện thoại không được để trống',
            'user_phone.min' => 'Số điện thoại gồm :min ký tự',
            // 'user_email.email' => 'Hãy nhập vào một Email',
            'user_pass.required' => 'Mật khẩu đăng nhập không được trống',
        ];
        $request->validate($rules, $message);

        $userModel = Customers::find($request->makh);
        $userModel->tenkh = $request->user_name;
        $userModel->sodienthoai = $request->user_phone;
        $userModel->email = $request->user_email;
        $userModel->password = bcrypt($request->user_pass);
        $userModel->gioitinh = $request->user_gender;
        $userModel->update_at = date('Y-m-d H:i:s');
        $userModel->save();

        return redirect()->back()->with('status','Cập nhật khách hàng thành công');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect()->route('home');
    }
}
