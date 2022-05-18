<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\RoleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public $data = [];
    // Dashboard Page
    public function index() {
        $this->data['title'] = 'Danh sách nhân viên';
        $this->data['listUsers'] = Admin::orderBy('manv','DESC')->search()->paginate(10);

        return view('admin.users.index', $this->data);
    }
    // Dashboard Page
    public function dashboard() {
        $this->data['title'] = 'Dashboard';

        $firstDay = date('Y-m-01 H:i:s');
        $lastDay = date('Y-m-t H:i:s');
        // dd($today);
        $this->data['orderQuantity'] = DB::table('donhang')->whereBetween('ngaydh',[$firstDay, $lastDay])->count();
        $this->data['newOrder'] = Order::where('trangthai', 0)->count();
        $this->data['total'] = DB::table('donhang')->selectRaw('sum(tongtien) as tongtien')->where('trangthai', 2)->first();
        // dd($this->data['total']);

        return view('admin.users.dashboard', $this->data);
    }

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
        $adminModel->password = bcrypt($request->adm_password);
        $adminModel->gioitinh = $request->adm_gender;
        $adminModel->create_at = date('Y-m-d H:i:s');
        $adminModel->update_at = date('Y-m-d H:i:s');
        // dd($adminModel);
        
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
            'adm_password' => 'required',
            'reenter_pass' => 'required'
        ];
        $message = [
            'adm_name.required' => 'Hãy nhập vào tên nhân viên',
            'adm_email.required' => 'Hãy nhập vào Email',
            'adm_phone.required' => 'Hãy nhập vào số điện thoại nhân viên',
            'adm_password.required' => 'Hãy nhập vào Password',
            'reenter_pass.required' => 'Trường này không được để trống'
        ];
        $request->validate($rules, $message);

        if($request->adm_password != $request->reenter_pass){
            return redirect()->back()->with('notify','Mật khẩu nhập lại không trùng khớp');
        }
        $adminModel = Admin::find($request->manv);
        $adminModel->tennv = $request->adm_name;
        $adminModel->email = $request->adm_email;
        $adminModel->sodienthoai = $request->adm_phone;
        $adminModel->password = bcrypt($request->adm_password);
        $adminModel->gioitinh = $request->adm_gender;
        $adminModel->update_at = date('Y-m-d H:i:s');
        $adminModel->save();
        return redirect()->back()->with('success','Cập nhật nhân viên thành công');
    }

    // Set Role
    public function setRole(Request $request) {
        dd($request->all());
        $roleDetailModel = new RoleDetail();
        $roleDetailModel->manv = $request->manv;
        $roleDetailModel->maquyen = $request->maquyen;
        $roleDetailModel->save();
        return redirect()->back()->with('success','Thiết lập quyền thành công');
    }

    // Delete
    public function destroy(Request $request) { 
        Admin::find($request->manv)->delete();
        return redirect()->back()->with('success', 'Xóa nhân viên thành công');
    }

}