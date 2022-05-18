<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Districts;
use App\Models\Products;
use App\Models\Promotion;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// session_start();

class CartController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('checkuserlogin');
    }

    public function index(Request $request) {
        // session()->forget('carts');
        $this->data['title'] = 'Giỏ hàng';
        $this->data['categories'] = Categories::where('trangthai','=', '1')->orderBy('madm', 'ASC')->get();
        $this->data['promotions'] = Promotion::orderBy('makm', 'ASC')->get();
        $this->data['carts'] = session()->get('carts');
        $this->data['total_item'] = isset(Session::all()['carts'])?count(Session::all()['carts']):0;

        return view('client.cart.cart', $this->data);
    }
    public function addToCart(Request $request) {
        // if(!Auth::check()) {
        //     return redirect()->route('client.user.login');
        // }
        $product_id = $request->product_id;
        $product_price = $request->product_price;
        $product_quantity = $request->product_quantity;
        $product_info = Products::find($product_id);
         
        $carts = session()->get('carts');
        if(isset($carts[$product_id])) {
            $carts[$product_id]['product_qty'] = $carts[$product_id]['product_qty'] + $product_quantity;
            $carts[$product_id]['subtotal'] = $carts[$product_id]['product_qty'] * $carts[$product_id]['product_price'];
        } else {
            $carts[$product_id] =  [
                'product_id' => $product_id,
                'product_name' =>$product_info->tensp,
                'product_avatar' =>$product_info->avatar,
                'product_qty' => $product_quantity,
                'product_price' => $product_price,
                'subtotal' => $product_quantity * $product_price
            ];
        }
        session()->put('carts', $carts);
        return response()->json([
            'status' => 'success'
        ]);
    }
    
    public function updateCart(Request $request) {
        if($request->id && $request->qty) {
            $carts = session()->get('carts');
            // dd($carts[$request->id]);
            $carts[$request->id]['product_qty'] = $request->qty;
            $carts[$request->id]['subtotal'] = $carts[$request->id]['product_qty'] * $carts[$request->id]['product_price'];

            session()->put('carts', $carts);
            $carts = session()->get('carts');
            // dd($carts);
            $cartComponent = view('client.cart.cartComponent',compact('carts'))->render();
            return response()->json(['cartComponent' => $cartComponent, 'status' => 'success']);
        }
    }

    public function destroy(Request $request) {
        $request->session()->flush();
        return redirect(route('client.cart'));
    }

    public function deleteItem(Request $request) {
        $carts = session()->get('carts');
        unset($carts[$request->id]);
        session()->put('carts', $carts);

        $this->data['title'] = 'Giỏ hàng';
        $this->data['categories'] = Categories::orderBy('madm', 'ASC')->get();
        $this->data['promotions'] = Promotion::orderBy('makm', 'ASC')->get();
        $this->data['carts'] = session()->get('carts');

        $cartComponent = view('client.cart.cartComponent',compact('carts'))->render();
        return response()->json(['cartComponent' => $cartComponent, 'status' => 'success']);
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
}
