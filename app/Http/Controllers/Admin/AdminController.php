<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public $data = [];
    // Dashboard Page
    public function index() {
        $this->data['title'] = 'Danh sách nhân viên';
        $this->data['listUsers'] = Admin::orderBy('manv','DESC')->get();

        return view('admin.users.index', $this->data);
    }
    // Dashboard Page
    public function dashboard() {
        $this->data['title'] = 'Dashboard';

        return view('admin.users.dashboard', $this->data);
    }
    // // Form login
    // public function login() {
    //     $this->data['title'] = 'Đăng nhập';

    //     return view('admin.users.login', $this->data);
    // }
    // // Authentication
    // public function handleLogin(Request $request) {
    //     $rules = [
    //         'adm_email' => 'required',
    //         'adm_password' => 'required'
    //     ];
    //     $message = [
    //         'adm_email.required' => 'Hãy nhập vào Email',
    //         'adm_password.required' => 'Hãy nhập vào Password'
    //     ];
    //     $request->validate($rules, $message);
    //     // dd($request);
        // $this->data['user'] = DB::table('nhanvien')
        //                     ->where('Email',$request->adm_email)
        //                     ->where('MatKhau',$request->adm_password)
        //                     ->first();
    //     if(!empty($this->data['user'])){
    //         $this->data['title'] = 'Dashboard';
    //         return view('admin.users.dashboard', $this->data);
    //     } else {
    //         return redirect()->back()->with('notify','Đăng nhập không thành công');
    //     }
    // }
    // Form create
    public function create() {
        $this->data['title'] = 'Thêm nhân viên';

        return view('admin.users.create', $this->data);
    }
    // Handle create
    public function store(Request $request) {
        // dd($request);
        $rules = [
            'adm_name' => 'required',
            'adm_email' => 'required',
            'adm_phone' => 'required',
            'adm_password' => 'required'
        ];
        $message = [
            'adm_name.required' => 'Hãy nhập vào tên nhân viên',
            'adm_email.required' => 'Hãy nhập vào Email',
            'adm_phone.required' => 'Hãy nhập vào số điện thoại nhân viên',
            'adm_password.required' => 'Hãy nhập vào Password'
        ];
        $request->validate($rules, $message);

        $adminModel = new Admin();
        $adminModel->tennv = $request->adm_name;
        $adminModel->email = $request->adm_email;
        $adminModel->sodienthoai = $request->adm_phone;
        $adminModel->password = $request->adm_password;
        $adminModel->gioitinh = $request->adm_gender;
        $adminModel->save();
        return redirect()->back()->with('success','Thêm nhân viên thành công');
    }
    // Form edit
    public function edit(Request $request) {
        $this->data['title'] = 'Cập nhật nhân viên';
        $this->data['user'] = Admin::find($request->manv);

        return view('admin.users.edit', $this->data);
    }
    // Handle edit
    public function update(Request $request) {
        // $rules = [
        //     'adm_name' => 'required',
        //     'adm_email' => 'required',
        //     'adm_phone' => 'require',
        //     'adm_password' => 'required'
        // ];
        // $message = [
        //     'adm_name.required' => 'Trường Họ tên không được trống',
        //     'adm_email.required' => 'Trường Email không được trống',
        //     'adm_phone.required' => 'Trường Số điện thoại không được trống',
        //     'adm_password.required' => 'Trường Mật khẩu không được trống',
        // ];
        // $request->validate($rules, $message);
        $rules = [
            'adm_name' => 'required',
            'adm_email' => 'required',
            'adm_phone' => 'required',
            'adm_password' => 'required'
        ];
        $message = [
            'adm_name.required' => 'Hãy nhập vào tên nhân viên',
            'adm_email.required' => 'Hãy nhập vào Email',
            'adm_phone.required' => 'Hãy nhập vào số điện thoại nhân viên',
            'adm_password.required' => 'Hãy nhập vào Password'
        ];
        $request->validate($rules, $message);

        $adminModel = Admin::find($request->manv);
        $adminModel->tennv = $request->adm_name;
        $adminModel->email = $request->adm_email;
        $adminModel->sodienthoai = $request->adm_phone;
        $adminModel->password = $request->adm_password;
        $adminModel->gioitinh = $request->adm_gender;
        $adminModel->save();
        return redirect()->back()->with('success','Cập nhật nhân viên thành công');
    }
    // Delete
    public function destroy(Request $request) { 
        Admin::find($request->manv)->delete();
        return redirect()->back()->with('success', 'Xóa nhân viên thành công');
    }

}
