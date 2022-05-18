<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Promotion;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $data = [];

    public function index(){
        $this->data['title'] = 'Trang chủ';
        $this->data['hot_prds'] = DB::table('sanpham')
                                ->join('khuyenmai','sanpham.makm','=','khuyenmai.makm')
                                ->where('NoiBat', '1')
                                ->where('sanpham.trangthai', '1')
                                ->limit(8)
                                ->get();
        $this->data['sale_prds'] = DB::table('sanpham')
                                ->join('khuyenmai', 'sanpham.makm', '=', 'khuyenmai.makm')
                                ->where('sanpham.makm','<>','1')
                                ->where('sanpham.trangthai', '1')
                                ->limit(8)->get();
        $this->data['categories'] = Categories::orderBy('madm', 'ASC')->get();
        $this->data['promotions'] = Promotion::orderBy('makm', 'ASC')->get();
        $this->data['sliders'] = Sliders::orderBy('maslider', 'DESC')->get();
        $this->data['sliders'] = $this->data['sliders']->toArray();

        return view('client.home', $this->data);
    }
}