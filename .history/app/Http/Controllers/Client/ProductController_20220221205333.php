<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\ProductImages;
use App\Models\Products;
use App\Models\Promotion;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $data = [];

    public function index(Request $request, $id) {
        dd($request->id);
        $this->data['title'] = 'Chi tiết sản phẩm';
        $this->data['product'] = Products::find($request->masp);
        $this->data['categories'] = Categories::orderBy('madm', 'DESC')->get();
        $this->data['promotions'] = Promotion::orderBy('makm', 'DESC')->get();
        $this->data['listImages'] = ProductImages::where('masp','=' ,$request->masp)
                                                    ->orderBy('mahinh', 'DESC')
                                                    ->get();

        return view('admin.products.edit', $this->data);
    }
}
