<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\ProductDetail;
use App\Models\ProductImages;
use App\Models\Products;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public $data = [];

    public function index(Request $request, $masp) {
        // dd($request->masp);
        $this->data['title'] = 'Chi tiết sản phẩm';
        $this->data['product'] = Products::join('khuyenmai','sanpham.makm','=','khuyenmai.makm')
                                            ->find($request->masp);

        $this->data['categories'] = Categories::where('trangthai','=', '1')->orderBy('madm', 'ASC')->get();

        $this->data['promotions'] = Promotion::find($this->data['product']->makm);

        $this->data['listImages'] = ProductImages::where('masp','=' ,$request->masp)
                                                    ->orderBy('mahinh', 'DESC')->get();

        $this->data['attributes'] =  ProductDetail::join('thuoctinh','chitietsp.matt','=','thuoctinh.matt')  
                                                    ->where('chitietsp.masp','=', $request->masp)
                                                    ->orderBy('thuoctinh.matt', 'ASC')->get();

        $this->data['comments'] = Comments::where('masp','=', $request->masp)
                                            ->whereNull('parent_id')
                                            ->with('hasReplyComment')
                                            ->with('hasProduct')
                                            ->with('hasUser')
                                            ->orderBy('ngaybl', 'DESC')->get();

        $this->data['total_item'] = isset(Session::all()['carts'])?count(Session::all()['carts']):0;
        
        $this->data['rating'] = Comments::where('masp','=' ,$request->masp)
                                        ->whereNull('parent_id')->avg('sosao');
        $hasComment = 0;
        if(Auth::check()) {
            foreach ($this->data['comments'] as $key => $value) {
                if(Auth::user()->makh == $value->makh) {
                    $hasComment = 1;
                }
            }
        }

        // dd($this->data['attributes']);

        return view('client.products.product-detail', $this->data, compact('hasComment'));
    }

    public function comment(Request $request) {
        // dd($request->all());
        if($request->product_rating == null || $request->product_comment == null) {
            return redirect()->back()->with('status', 'error')->with('sttContent', 'Bạn chưa đánh giá sản phẩm');
        }
        $commentModel = new Comments();
        $commentModel->noidung = $request->product_comment;
        $commentModel->sosao = $request->product_rating;
        $commentModel->masp = $request->product_id;
        $commentModel->makh = Auth::user()->makh;
        $commentModel->ngaybl = date('Y-m-d H:i:s');

        if($commentModel->save()) {
            $productModel = Products::find($request->product_id);
            $productModel->danhgiatb = Comments::where('masp','=' ,$request->product_id)->avg('sosao');
            $productModel->save();
            return redirect()->back()->with('status', 'success')->with('sttContent', 'Bình luận thành công');
        } else {
            return redirect()->back()->with('status', 'success')->with('sttContent', 'Bình luận thất bại');
        }


    }
    
}
