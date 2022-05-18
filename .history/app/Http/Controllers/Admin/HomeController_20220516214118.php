<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $data = [];
    public $paginateNumber = 10;

    // Dashboard Page
    public function index() {
        $this->data['title'] = 'Dashboard';

        $firstDay = date('Y-m-01');
        $lastDay = date('Y-m-t');
        $this->data['orderQuantity'] = DB::table('donhang')->whereBetween('ngaydh',[$firstDay, $lastDay])->count();
        $this->data['newOrder'] = Order::where('trangthai', 0)->count();
        $this->data['total'] = DB::table('donhang')->whereBetween('ngaydh',[$firstDay, $lastDay])->selectRaw('sum(tongtien) as tongtien')->where('trangthai', 2)->first();
        $this->data['products'] = Products::where('trangthai', 1)->orderBy('soluong', 'ASC')->search()->paginate($this->paginateNumber);

        return view('admin.users.dashboard', $this->data);
    }
}