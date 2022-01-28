<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $data = [];

    public function index(){
        $this->data['title'] = 'Trang chủ';
        $this->data['hot_prds'] = DB::table('sanpham')->where('NoiBat', '1')->limit(7)->get();
        $this->data['sale_prds'] = DB::table('sanpham')
        ->where('MaKM', '<>', '1')
        ->whereNotNull('MaKM')
        ->limit(7)->get();

        return view('client.home', $this->data);
    }
}
