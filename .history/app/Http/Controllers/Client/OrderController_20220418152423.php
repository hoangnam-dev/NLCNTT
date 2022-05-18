<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public $data = [];

    public function index() {
        $this->data['title'] = 'Quản lý đơn hàng';
        $this->data['categories'] = Categories::where('trangthai','=', '1')->orderBy('madm', 'ASC')->get();
        $this->data['orders'] = Order::where('makh', Auth::user()->makh)->orderBy('trangthai', 'ASC')->orderBy('ngaydh','DESC')->paginate(10);
        $this->data['total_item'] = isset(Session::all()['carts'])?count(Session::all()['carts']):0;

        return view('client.users.order.index', $this->data);
    }
    
    public function orderByStatus(Request $request) {
        $this->data['title'] = 'Chi tiết đơn hàng';
        $this->data['categories'] = Categories::where('trangthai','=', '1')->orderBy('madm', 'ASC')->get();
        $orders = Order::where('makh', Auth::user()->makh)->where('trangthai', $request->status)->orderBy('ngaydh', 'DESC')->get();
        $this->data['total_item'] = isset(Session::all()['carts'])?count(Session::all()['carts']):0;
        // $orders = $request->status;
        // dd( $orders);

        // $ordersComponent = view('client.users.order.order-component',compact('orders'))->render();
        // return response()->json([
        //     'orders' => $orders,
        // ]);

        $orderComponent = view('client.users.order.order-component',compact('orders'))->render();
        return response()->json(['orderComponent' => $orderComponent, 'status' => 'success']);
    }

    // public function store(Request $request) {
    //     // Get order info
    //     $deliveryAddr = $request->customerAddr;
    //     $customerID = $request->customerID;
    //     $orderTime = date('Y-m-d H:i:s');
    //     $orderStatus = 0;
    //     $orderNote = '';

    //     // Create new record in donhang
    //     DB::table('donhang')->insert([
    //         'diachi_gh'=> $deliveryAddr,
    //         'makh' =>  $customerID,
    //         'ngaydh' =>  $orderTime,
    //         'trangthai'=> $orderStatus,
    //         'ghichu' => $orderNote,
    //         'tongtien' => 0
    //     ]);

    //     // Get new orderID
    //     $orderID = DB::getPdo()->lastInsertId();
    //     $carts = session()->get('carts');
    //     foreach ($carts as $key => $value) {
    //         // Get carts info
    //         $productID = $value['product_id'];
    //         $productQty = $value['product_qty'];
    //         $productPrice = $value['product_price'];
    //         $productSubtotal = $value['subtotal'];
    //         $prd = Products::find($productID);
    //         $newQty= $prd->soluong - $productQty;
            
    //         // Update product quantity
    //         DB::table('sanpham')
    //           ->where('masp', $productID)
    //           ->update(['soluong' => $newQty]);

    //         // Create new record in chitietdh
    //         DB::table('chitietdh')->insert([
    //             'madh' => $orderID,
    //             'masp'=> $productID,
    //             'soluongmua' =>  $productQty,
    //             'dongiaban'=> $productPrice,
    //         ]);
            
    //     }
    //     // Update colum tingtien in table donhang
    //     DB::table('donhang')
    //           ->where('madh', $orderID)
    //           ->update(['tongtien' => $productSubtotal]);


    //     // Destroy session carts
    //     $request->session()->forget('carts');

    //     return redirect(route('client.user.order-detail', ['id' => $orderID]))->with('status', 'success')->with('msg', 'Cảm ơn vì bạn đã đặt hàng!');
    // }

    public function showOrderDetail(Request $request) {
        $this->data['title'] = 'Chi tiết đơn hàng';
        $this->data['categories'] = Categories::where('trangthai','=', '1')->orderBy('madm', 'ASC')->get();
        $this->data['order'] = Order::find($request->id);
        $customerID = $this->data['order']->makh;
        $this->data['customerOrd'] = Customers::find($customerID);
        $this->data['orderDetail'] = DB::table('chitietdh')
                                    ->join('sanpham', 'sanpham.masp','=','chitietdh.masp')
                                    ->where('madh', $request->id)
                                    ->get();
        $this->data['total_item'] = isset(Session::all()['carts'])?count(Session::all()['carts']):0;
        // dd($request->id);
        // dd($this->data['orderDetail']);
        
        return view('client.users.order.order-detail', $this->data);
    }

    public function destroy(Request $request) {
        $order = Order::find($request->madh);
        $productOrder = DB::table('chitietdh')->where('madh', $request->madh)->get();
        foreach ($productOrder as $value) {
            $productModel = Products::find($value->masp);
            $productModel->soluong += $value->soluongmua;
            $productModel->save();
        }
        
        $ordDetail = DB::table('chitietdh')->where('madh', $request->madh)->delete();
        
        if($order->delete()) {
            return redirect()->route('client.user.order')->with('status', 'success')->with('msg', 'Đơn hàng đã được hủy!');
        }
        else {
            return redirect()->route('client.user.order')->with('status', 'danger')->with('msg', 'Hủy đơn hàng không thành công');
        }
    }


}
