<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    // Show list customers
    public $data = [];

    public function index() {
        $this->data['title'] = 'Danh sách khách hàng';
        $this->data['listCustomers'] = Customers::orderBy('MaKH','DESC')->get();

        return view('admin.customers.index', $this->data);
    }
    // Form create customer
    public function create() {
        $this->data['title'] = 'Thêm khách hàng';

        return view('admin.customers.create', $this->data);
    }
    // Insert customer to database
    public function store(Request $request) {
        $rules = [
            'customer_name' => 'required',
            'customer_phone' => 'required|min:10',
            // 'customer_email' => 'email:filter',
            'customer_pass' => 'required',
        ];

        $message = [
            'customer_name.required' => 'Tên khách hàng không được để trống',
            'customer_phone.required' => 'Số điện thoại không được để trống',
            'customer_phone.min' => 'Số điện thoại gồm :min ký tự',
            // 'customer_email.email' => 'Hãy nhập vào một Email',
            'customer_pass.required' => 'Mật khẩu đăng nhập không được trống',
        ];
        $request->validate($rules, $message);

        $customerModel = new Customers();
        $customerModel->TenKH = $request->customer_name;
        $customerModel->SoDienThoai = $request->customer_phone;
        $customerModel->Email = $request->customer_email;
        $customerModel->MatKhau = $request->customer_pass;
        $customerModel->GioiTinh = $request->customer_sex;
        $customerModel->NgayTao = date('Y-m-d H:i:s');
        $customerModel->save();

        return redirect()->back()->with('status','Thêm khách hàng thành công');
    }
    // Form edit customer
    public function edit(Request $request) {
        $this->data['title'] = 'Cập nhật khách hàng';
        $this->data['customer'] = Customers::find($request->MaKH);

        return view('admin.customers.edit', $this->data);
    }
    // Update customer to database
    public function update(Request $request) {
        $rules = [
            'customer_name' => 'required',
            'customer_phone' => 'required|min:10',
            // 'customer_email' => 'email:filter',
            'customer_pass' => 'required',
        ];

        $message = [
            'customer_name.required' => 'Tên khách hàng không được để trống',
            'customer_phone.required' => 'Số điện thoại không được để trống',
            'customer_phone.min' => 'Số điện thoại gồm :min ký tự',
            // 'customer_email.email' => 'Hãy nhập vào một Email',
            'customer_pass.required' => 'Mật khẩu đăng nhập không được trống',
        ];
        $request->validate($rules, $message);

        $customerModel = Customers::find($request->MaKH);
        $customerModel->TenKH = $request->customer_name;
        $customerModel->SoDienThoai = $request->customer_phone;
        $customerModel->Email = $request->customer_email;
        $customerModel->MatKhau = $request->customer_pass;
        $customerModel->GioiTinh = $request->customer_sex;
        $customerModel->NgaySua = date('Y-m-d H:i:s');
        $customerModel->save();

        return redirect()->back()->with('status','Cập nhật khách hàng thành công');
    }
    // Delete customer in database
    public function destroy(Request $request) {
        Customers::find($request->MaKH)->delete();

        return redirect()->back()->with('status', 'Xóa khách hàng thành công');
    }
}