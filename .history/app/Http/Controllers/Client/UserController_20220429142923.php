<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Customers;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
            return redirect()->route('client.home');
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
        $this->data['cities'] = Cities::orderBy('id_ttp', 'ASC')->get();

        return view('client.users.register', $this->data);
    }

    // Insert user to database
    public function handleRegister(Request $request) {
        $rules = [
            'user_name' => 'required',
            'user_phone' => 'required|min:10',
            // 'user_email' => 'email:filter',
            'user_password' => 'required',
            // 'user_address' => 'required',
        ];

        $message = [
            'user_name.required' => 'Tên khách hàng không được để trống',
            'user_phone.required' => 'Số điện thoại không được để trống',
            'user_phone.min' => 'Số điện thoại gồm :min ký tự',
            // 'user_email.email' => 'Hãy nhập vào một Email',
            'user_password.required' => 'Mật khẩu đăng nhập không được trống',
            // 'user_address.required' => 'Địa chỉ không được trống',
        ];
        $request->validate($rules, $message);

        dd($request->all());
        $userModel = new Customers();
        $userModel->tenkh = $request->user_name;
        $userModel->sodienthoai = $request->user_phone;
        $userModel->email = $request->user_email;
        $userModel->password = bcrypt($request->user_password);
        $userModel->gioitinh = $request->user_gender>0?$request->user_gender:1;
        $userModel->create_at = date('Y-m-d H:i:s');
        if($userModel->save()) {
            return redirect()->back()->with('status', 'success')->with('message', 'Đăng ký thành công');
        }
        else {
            return redirect()->back()->with('status', 'danger')->with('message', 'Đăng ký không thành công');
        }

    }

    // Reset Password
    public function resetPasswordForm(Request $request) {
        $this->data['title'] = 'Đặt mật khẩu';

        return view('client.users.reset_PW.confirm_email_reset', $this->data);
    }
    public function handleResetPasswordForm(Request $request) {
        $rules = [
            'customer_email' => 'required',
        ];

        $message = [
            'customer_email.required' => 'Email không được để trống',
        ];
        $request->validate($rules, $message);

        $customer = Customers::where('email', $request->customer_email)->first();
        if($customer === null) {
            return redirect()->back()->with('status', 'danger')->with('message', 'Email chưa được đăng ký');
        }
        else {
            dd(rad2deg(4));
            // $customer->resetpass_token = rad2deg(4);
            // $customer->save();
            // $this->sendResetPasswordEmail($customer);
            // return redirect()->back()->with('status', 'success')->with('message', 'Vui lòng kiểm tra email để đặt lại mật khẩu');
        }
    }
    public function handleResetPassword(Request $request) {
        dd($request->all());
    }

    // Form profile user    
    public function profile() {
        $this->data['title'] = 'Profile';
        $this->data['categories'] = Categories::where('trangthai','=', '1')->orderBy('madm', 'ASC')->get();
        $this->data['cities'] = Cities::orderBy('id_ttp', 'ASC')->get();
        $this->data['promotions'] = Promotion::orderBy('makm', 'ASC')->get();
        $this->data['customer'] = User::find(Auth::user()->makh);
        $this->data['customerAddress'] = Address::where('makh',Auth::user()->makh)->get();
        $this->data['Address'] = DB::table('diachi')
                                ->join('xaphuong', 'diachi.id_xp', '=', 'xaphuong.id_xp')
                                ->join('quanhuyen', 'xaphuong.id_qh', '=', 'quanhuyen.id_qh')
                                ->join('tinhthanhpho', 'quanhuyen.id_ttp', '=', 'tinhthanhpho.id_ttp')
                                ->where('diachi.makh','=',Auth::user()->makh)
                                ->get();
        $this->data['total_item'] = isset(Session::all()['carts'])?count(Session::all()['carts']):0;

        return view('client.users.profile', $this->data);
    }

    // Update user to database
    public function update(Request $request) {
        $rules = [
            'user_name' => 'required',
            'user_phone' => 'required|min:10',
            // 'user_email' => 'email:filter',
        ];

        $message = [
            'user_name.required' => 'Tên khách hàng không được để trống',
            'user_phone.required' => 'Số điện thoại không được để trống',
            'user_phone.min' => 'Số điện thoại gồm :min ký tự',
            // 'user_email.email' => 'Hãy nhập vào một Email',
        ];
        $request->validate($rules, $message);

        $userModel = Customers::find($request->makh);
        $userModel->tenkh = $request->user_name;
        $userModel->sodienthoai = $request->user_phone;
        $userModel->email = $request->user_email;
        if(!is_null($request->user_password)) {
            $userModel->password = bcrypt($request->user_password);
        }
        $userModel->gioitinh = $request->user_gender;
        $userModel->update_at = date('Y-m-d H:i:s');
        $userModel->save();

        return redirect()->back()->with('status', 'success')->with('msg', 'Cập nhật thông tin thành công');
    }

    public function addAddress(Request $request) {
        $customerID = Auth::user()->makh;
        $wardID = $request->ward;
        $addr = $request->address;
        // dd($customerID.'==='.$wardID.'==='.$addr);
        DB::table('diachi')->insert([
            'diachi'=> $addr,
            'makh' =>  $customerID,
            'id_xp' =>  $wardID,
        ]);

        return redirect()->back()->with('status', 'success')->with('msg', 'Thêm địa chỉ thành công');
    }

    public function getLocation(Request $request) {
        $col = (int)$request->id;
        if($request->parent == 'city') {
            $data = DB::table('quanhuyen')->where('id_ttp', $col)->get();
            $type = 'district';
        }
        elseif($request->parent == 'district') {
            $data = DB::table('xaphuong')->where('id_qh', $col)->get();
            $type = 'ward';
        }

        return response()->json(['data'=> $data, 'type' => $type], $status = 200);
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
    
        return redirect()->route('client.home');
    }
}
