<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Promotion;
use App\Models\Products;
use App\Models\Sliders;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public $data = [];

    public function index(Request $request)
    {
        $this->data['title'] = "Danh mục";
        $this->data['categories'] = Categories::where('trangthai', '=', '1')->orderBy('madm', 'ASC')->get();
        // $this->data['promotions'] = Promotion::orderBy('makm', 'ASC')->get();
        $this->data['categoryName'] = "Tất cả";
        $this->data['listProducts'] = DB::table('sanpham')
            ->join('khuyenmai', 'khuyenmai.makm', '=', 'sanpham.makm')
            ->orderBy('tensp', 'ASC')
            ->paginate(10);
        $this->data['sliders'] = Sliders::orderBy('maslider', 'DESC')->get();
        $this->data['sliders'] = $this->data['sliders']->toArray();
        $this->data['total_item'] = isset(Session::all()['carts']) ? count(Session::all()['carts']) : 0;

        return view('client.category.index', $this->data);
    }
    public function listProductsByCategory(Request $request)
    {
        // dd($request->all());
        $this->data['categories'] = Categories::where('trangthai', '=', '1')->orderBy('madm', 'ASC')->get();
        $this->data['promotions'] = Promotion::orderBy('makm', 'ASC')->get();
        $this->data['category'] = DB::table('danhmuc')->where('madm', '=', $request->madm)->first();
        $this->data['categoryName'] = $this->data['category']->tendm;
        $this->data['listProducts'] = DB::table('sanpham')
            ->join('khuyenmai', 'khuyenmai.makm', '=', 'sanpham.makm')
            ->where('madm', '=', $request->madm)
            ->orderBy('masp', 'DESC')
            ->paginate(10);

        $categoryComponent = view('client.category.listProductByCategory', $this->data)->render();
        return response()->json(['categoryComponent' => $categoryComponent, 'status' => 'success']);
    }

    public function sortPrice(Request $request)
    {
        $sort = explode('-', $request->sort_price);
        $min = $sort[0];
        $max = $sort[1];
        if ($request->madm == 0) {
            $this->data['categoryName'] = 'Tất cả';
            $this->data['listProducts'] = DB::select('select *, (sanpham.giaban - (sanpham.giaban * khuyenmai.giatri)/100) as giakm from sanpham inner join khuyenmai on sanpham.makm = khuyenmai.makm where (sanpham.giaban - (sanpham.giaban * khuyenmai.giatri)/100) between ? and ?', $sort);
            $this->data['listProducts'] = collect($this->data['listProducts'])
                ->filter(function ($item) use ($min, $max) {
                    return $item->giakm >= $min && $item->giakm <= $max;
                });
        } else {
            $sort[2] = $request->madm;
            $this->data['category'] = DB::table('danhmuc')->where('madm', '=', $request->madm)->first();
            $this->data['categoryName'] = $this->data['category']->tendm;
            $this->data['listProducts'] = DB::select('select *, (sanpham.giaban - (sanpham.giaban * khuyenmai.giatri)/100) as giakm from sanpham inner join khuyenmai on sanpham.makm = khuyenmai.makm where (sanpham.giaban - (sanpham.giaban * khuyenmai.giatri)/100) between ? and ? and sanpham.madm = ?', $sort);

            $this->data['listProducts'] = collect($this->data['listProducts'])
                ->filter(function ($item) use ($min, $max) {
                    return $item->giakm >= $min && $item->giakm <= $max;
                });
        }
        $this->data['listProducts'] = $this->data['listProducts']->sortBy('giakm');

        $categoryComponent = view('client.category.listProductByCategory', $this->data)->render();
        return response()->json(['categoryComponent' => $categoryComponent, 'status' => 'success']);
    }
}
