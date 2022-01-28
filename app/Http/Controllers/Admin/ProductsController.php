<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ProductsController extends Controller
{
    public $data = [];
    // List Products
    public function index() {
        $this->data['title'] = 'Danh sách sản phẩm';
        $this->data['listProducts'] = Products::orderBy('create_at', 'DESC')->with('hasCategory')->search()->paginate(10);
        
        return view('admin.products.index', $this->data);
    }
    // Show form create product
    public function create() {
        $this->data['title'] = 'Thêm sản phẩm';
        $this->data['categories'] = Categories::orderBy('madm', 'DESC')->get();
        $this->data['promotions'] = Promotion::orderBy('makm', 'DESC')->get();

        return view('admin.products.create',$this->data);
    }
    // Insert product to database
    public function store(Request $request) {
        $rules = [
            'name' => 'required|min:2',
            'quantity' => 'required',
            'price' => 'required',
            'avatar' =>'image|mimes:jpg,png,jpeg,gif,svg',
        ];
        $messages = [
            'name.required'=>'Tên sản phẩm không được để trống',
            'name.min'=>'Tên sản phẩm phải lớn hơn :min ký tự',
            'quantity.required'=>'Số lượng không được để trống',
            'price.required'=>'Giá bán không được để trống',
            'avatar.image'=>'Hãy chọn file hình ảnh',
            'avatar.mimes'=>'Hãy chọn file hình ảnh',
        ];
        $request->validate($rules, $messages);

        $productModel = new Products();
        $productModel->tensp = $request->name;
        $productModel->soluong = $request->quantity;
        $productModel->giaban = str_replace(array('.', ','), '', $request->price);
        $productModel->mota = $request->description;
        $productModel->noibat = '0';
        $productModel->trangthai = $request->status;
        $productModel->xuatxu = $request->origin;
        $productModel->create_at = date('Y-m-d H:i:s');
        $productModel->madm = $request->category_id;
        if($request->promo_id!=='0'){
            $productModel->makm = $request->promo_id;
        }
        // Uploads Product Avatar
        // Cách 1:
        // $path = "assets/uploads/products/";
        // $getImage = $request->avatar;
        // $getNameImage = $getImage->getClientOriginalName();
        // $nameImage = current(explode('.',$getNameImage));
        // $newImage = $nameImage."_".rand(0,99)."_".rand(0,99).".".$getImage->getClientOriginalExtension();
        // $getImage->move($path,$newImage);
        // dd($getImage->move($path,$newImage));
        
        // // Cách 2:
        if(isset($request->avatar)) {
            $imageName = $request->avatar->getClientOriginalName();
            $path = "assets/uploads/products/".$imageName;
            if(!file_exists($path)) {
                if(!$this->uploadImage($request->avatar, $imageName)) {
                    return redirect()->back()->with('status','Upload Avatar sản phẩm không thành công');
                }
            }
            $nameAvatar = $imageName;
        }

        $productModel->Avatar = $nameAvatar;

        $productModel->save(); 
        // Lấy masp sau khi insert 
        $lastID = $productModel->masp; // masp là pk của table 

        // Upload other product images
        if($request->hasFile('other_img')) {
            foreach ($request->other_img as $key => $image) {
                $imageName = $image->getClientOriginalName();
                $path = "assets/uploads/products/" . $imageName;
                if (!file_exists($path)) {
                    if (!$this->uploadImage($image, $imageName)) {
                        return redirect()->back()->with('status', 'Upload ảnh sản phẩm không thành công');
                    }
                }
                DB::table('hinhsanpham')->insert([
                    'hinhanh'=> $imageName,
                    'masp' =>  $lastID,
                ]);
            }
        }

        return redirect()->back()->with('status','Thêm sản phẩm thành công');
    }
    // Show product info
    public function edit(Request $request) {
        $this->data['title'] = 'Chi tiết sản phẩm';
        $this->data['product'] = Products::find($request->masp);
        $this->data['categories'] = Categories::orderBy('madm', 'DESC')->get();
        $this->data['promotions'] = Promotion::orderBy('makm', 'DESC')->get();
        $this->data['listImages'] = ProductImages::where('masp','=' ,$request->masp)
                                                    ->orderBy('mahinh', 'DESC')
                                                    ->get();

        return view('admin.products.edit', $this->data);
    }
    // Update product
    public function update(Request $request) {
        $rules = [
            'name' => 'required|min:2',
            'quantity' => 'required',
            'price' => 'required',
        ];
        $messages = [
            'name.required'=>'Tên sản phẩm không được để trống',
            'name.min'=>'Tên sản phẩm phải lớn hơn :min ký tự',
            'quantity.required'=>'Số lượng không được để trống',
            'price.required'=>'Giá bán không được để trống',
        ];
        $request->validate($rules, $messages);
        $nameAvatar = $request->avatar; // Current Avatar
        if(isset($request->new_avatar)) {
            $imageName = $request->new_avatar->getClientOriginalName();
            $path = "assets/uploads/products/" . $imageName;
            if(!file_exists($path)) {
                if (!$this->uploadImage($request->new_avatar, $imageName)) {
                    return redirect()->back()->with('status', 'Upload Avatar sản phẩm không thành công');
                }
            }
            $nameAvatar = $imageName; // New Avatar
        }
        
        $productModel = Products::find($request->masp);
        $productModel->tensp = $request->name;
        $productModel->soluong = $request->quantity;
        $productModel->Avatar = $nameAvatar;
        $productModel->giaban = str_replace(array('.', ','), '', $request->price);
        $productModel->MoTa = $request->description;
        $productModel->noibat = $request->hot;
        $productModel->trangthai = $request->status;
        $productModel->xuatxu = $request->origin;
        $productModel->update_at = date('Y-m-d H:i:s');
        $productModel->madm = $request->category_id;
        if($request->promo_id!=='0'){
            $productModel->makm = $request->promo_id;
        }
        $productModel->save();

        // Upload other product images
        if($request->hasFile('other_img')) {
            foreach ($request->other_img as $key => $image) {
                $imageName = $image->getClientOriginalName();
                $path = "assets/uploads/products/" . $imageName;
                if (!file_exists($path)) {
                    if (!$this->uploadImage($image, $imageName)) {
                        return redirect()->back()->with('status', 'Upload ảnh sản phẩm không thành công');
                    }
                }
                DB::table('hinhsanpham')->insert([
                    'hinhanh'=> $imageName,
                    'masp' =>  $request->masp,
                ]);
            }
        }

        return redirect()->back()->with('status','Cập nhật sản phẩm thành công');
    }
    // Status product
    public function status(Request $request) {
        dd($request->status);
        return 'true';
    }
    // Delete product by masp
    public function destroy(Request $request)
    {
        $product = Products::find($request->masp);
        $path = "assets/uploads/products/".$product->Avatar;
        if(file_exists($path)) {
            unlink($path);
        }

        $image = DB::table('hinhsanpham')->where('masp', '=', $request->masp)->get();
        foreach($image as $img) {
            $img_path = "assets/uploads/products/".$img->hinhanh;
            if(file_exists($img_path)) {
                unlink($img_path);
            }
        }
        DB::table('hinhsanpham')->where('masp', '=', $request->masp)->delete();;

        $product->delete();
        return redirect()->back()->with('status','Xóa sản phẩm thành công');
    }

    // Upload Image
    public function uploadImage($avatar, $imgName) {
        $flag = false;
        $path = "assets/uploads/products/";
        if($avatar->move($path,$imgName)) {
            $flag = true;
        }
        return $flag;
    }

    // Delete Image
    public function deleteImage(Request $request) {
        $image = ProductImages::find($request->mahinh);
        $path = "assets/uploads/products/".$image->hinhanh;
        
        if(file_exists($path)) {
            unlink($path);
        }
        $image->delete();
        return redirect()->back()->with('status','Xóa hình sản phẩm thành công');
    }
}
