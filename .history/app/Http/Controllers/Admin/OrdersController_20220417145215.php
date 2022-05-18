<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public $data = [];

    public function index(Request $request) {
        $this->data['title'] = 'Quản lý đơn hàng';
        $this->data['orders'] = Order::orderBy('trangthai', 'ASC')
                                ->orderBy('ngaydh','DESC')
                                ->with('hasUser')
                                ->search()->paginate(10);

        return view('admin.orders.index', $this->data);
    }
    
    public function orderByStatus(Request $request) {
        $this->data['title'] = 'Quản lý đơn hàng';
        $this->data['orders'] = Order::where('trangthai',$request->status)
                                ->orderBy('trangthai', 'ASC')
                                ->orderBy('ngaydh','DESC')
                                ->with('hasUser')
                                ->search()->paginate(10);

        return view('admin.orders.index', $this->data);
    }
    
    public function orderInMonth(Request $request) {
        $month = date('m');
        $this->data['title'] = 'Đơn hàng trong tháng '.$month;
        $firstDay = date('Y-m-01');
        $lastDay = date('Y-m-t');
        $this->data['orders'] = Order::whereBetween('ngaydh',[$firstDay, $lastDay])
                                ->orderBy('trangthai', 'ASC')
                                ->orderBy('ngaydh','DESC')
                                ->with('hasUser')
                                ->search()->paginate(10);

        return view('admin.orders.index', $this->data);
    }

    public function orderCompleteInMonth(Request $request) {
        $month = date('m');
        $this->data['title'] = 'Đơn hàng đã hoàn thành trong tháng '.$month;
        $firstDay = date('Y-m-01');
        $lastDay = date('Y-m-t');
        $this->data['orders'] = Order::where('trangthai','=','2')
                                ->whereBetween('ngaydh',[$firstDay, $lastDay])
                                ->orderBy('trangthai', 'ASC')
                                ->orderBy('ngaydh','DESC')
                                ->with('hasUser')
                                ->search()->paginate(10);

        return view('admin.orders.index', $this->data);
    }

    public function edit(Request $request) {
        $this->data['title'] = 'Chi tiết đơn hàng';
        $this->data['orderInfo'] = Order::join('khachhang', 'donhang.makh', '=', 'khachhang.makh')->where('madh', $request->madh)->first();
        
        $this->data['orderDetail'] = OrderDetail::where('madh', $request->madh)->with('hasProducts')->get();

        return view('admin.orders.edit', $this->data);
    }

    public function update(Request $request) {
        $orderModel = Order::find($request->orderID);
        // dd($request->all());
        if($orderModel->ngaygh == null) {
            // dd($request->all());
            $rules = [
                'delivery_date' => 'required',
            ];

            $messages = [
                'delivery_date.required'=>'Ngày giao không được để trống',
            ];
            $request->validate($rules, $messages);
        }

        // Check order delivery date
        if(strtotime($orderModel->ngaydh) > strtotime($request->delivery_date) == true) {
            return redirect()->back()->with('status', 'danger')->with('sttContent', 'Ngày giao phải sau ngày đặt hàng');
        }

        $orderModel->ngaygh = $request->delivery_date;
        $orderModel->trangthai++;
        if($orderModel->save()) {
            $status = 'success';
            $sttContent = 'Thao tác thành công';
        } 
        else {
            $status = 'error';
            $sttContent = 'Thao tác trạng thái thất bại';
        }
        
        // Send Mail Confirm
        if($orderModel->trangthai==1) {
            $orderInfo = Order::join('khachhang', 'donhang.makh', '=', 'khachhang.makh')->where('madh', $request->orderID)->first();
            // dd($orderInfo);
            $orderDetail = DB::table('chitietdh')
            ->join('sanpham', 'sanpham.masp','=','chitietdh.masp')
            ->where('madh', $request->orderID)
            ->get();
            Mail::send('mail.confirm-mail', compact('orderInfo', 'orderDetail'), function ($email) use ($orderInfo) {
                $email->to($orderInfo->email, $orderInfo->tenkh)
                ->subject('ABCShop - Xác nhận đơn hàng');
            });
        
        }
        return redirect()->route('admin.orders')->with('status', $status)->with('sttContent', $sttContent);
    }

    public function destroy(Request $request) {
        // dd($request->all());
        $reason = $request->reason;
        $orderInfo = Order::where('madh',$request->orderID)->with('hasUser')->first();
        dd(gettype($reason));
        $productOrder = DB::table('chitietdh')->where('madh', $request->orderID)->get();
        foreach ($productOrder as $value) {
            $productModel = Products::find($value->masp);
            $productModel->soluong += $value->soluongmua;
            $productModel->save();
        }
        Mail::send('mail.del_order-mail', compact('orderInfo', 'reason'), function ($email) use ($orderInfo) {
            $email->to($orderInfo->hasUser->email, $orderInfo->hasUser->tenkh)
            ->subject('ABCShop - Hủy đơn hàng');
        });

        $ordDetail = DB::table('chitietdh')->where('madh', $request->orderID)->delete();

        if($orderInfo->delete()) {
            $status = 'success';
            $sttContent = 'Hủy đơn hàng thành công';
        } 
        else {
            $status = 'error';
            $sttContent = 'Hủy đơn hàng thất bại';
        }
        return redirect()->route('admin.orders')->with('status', $status)->with('sttContent', $sttContent);
    }
}
