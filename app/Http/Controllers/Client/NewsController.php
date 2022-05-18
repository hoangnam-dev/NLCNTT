<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public $data = [];
    public $paginateNumber = 10;

    public function index(Request $request) {
        $this->data['title'] = 'Tin tức';
        $this->data['categories'] = Categories::where('trangthai','=', '1')->orderBy('madm', 'ASC')->get();
        $this->data['news'] = News::orderBy('ngaydang', 'DESC')->paginate($this->paginateNumber);
        $this->data['total_item'] = isset(Session::all()['carts'])?count(Session::all()['carts']):0;

        return view('client.news.index', $this->data);
    }

    public function detail(Request $request) {
        $this->data['title'] = 'Chi tiết tin tức';
        $this->data['categories'] = Categories::where('trangthai','=', '1')->orderBy('madm', 'ASC')->get();  
        $this->data['news'] = News::find($request->news);
        $this->data['total_item'] = isset(Session::all()['carts'])?count(Session::all()['carts']):0;
        return view('client.news.news-detail', $this->data);
    }
}
