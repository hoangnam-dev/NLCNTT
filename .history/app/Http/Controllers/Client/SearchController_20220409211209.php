<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request) {
        $this->data['title'] = 'Tìm kiếm';
        $key = $request->search_key;
        $this->data['rs_search'] = DB::table('sanpham')
                                ->join('khuyenmai', 'sanpham.makm', '=', 'khuyenmai.makm')
                                ->where('tensp', 'LIKE', "%{$key}%")
                                ->get();
        // dd($this->data['rs_search']);
        $this->data['categories'] = Categories::orderBy('madm', 'ASC')->get();
        $this->data['promotions'] = Promotion::orderBy('makm', 'ASC')->get();

        return view('client.search.index', $this->data, compact('key'));
    }
}
