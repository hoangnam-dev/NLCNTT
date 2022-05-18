<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{
    public $data = [];
    // Show list Brands
    public function index() {
        $this->data['title'] = 'Danh sách hãng sản xuất';
        $this->data['listBrands'] = Brands::orderBy('mahsx', 'DESC')->search()->paginate(10);
        return view('admin.brands.index',$this->data);
    }
    // Show form insert brand
    public function create() {
        $this->data['title'] = 'Thêm hãng sản xuất';
        return view('admin.brands.create', $this->data);
    }
    // Insert brand to database  
    public function store(Request $request) {
        $rules = [
            'brand_name' => 'required|unique:hangsx,TenHang|min:2',
        ];
        $messages = [
            'brand_name.required'=>'Tên hãng sản xuất không được để trống',
            'brand_name.unique'=>'Tên hãng sản xuất đã tồn tại',
            'brand_name.min'=>'Tên hãng sản xuất phải lớn hơn :min ký tự'
        ];
        $request->validate($rules, $messages);
        
        $brandModel = new Brands();
        $brandModel->tenhang = $request->brand_name;
        $brandModel->save(); 

        return redirect()->back()->with('status','Thêm hãng sản xuất thành công');
    }
    // Show info brand by id
    public function edit(Request $request) {
        $this->data['title'] = 'Chi tiết hãng sản xuất';
        $this->data['brand'] = Brands::find($request->mahsx);

        return view('admin.brands.edit', $this->data);
    }
    // Update brand
    public function update(Request $request) {
        $rules = [
            'brand_name' => 'required|min:2',
        ];
        $messages = [
            'brand_name.required'=>'Tên hãng sản xuất không được để trống',
            'brand_name.min'=>'Tên hãng sản xuất phải lớn hơn :min ký tự'
        ];
        $request->validate($rules, $messages);
        
        $brandModel = Brands::find($request->mahsx);
        $brandModel->tenhang = $request->brand_name;
        $brandModel->save(); 

        return redirect()->back()->with('status','Cập nhật hãng sản xuất thành công');
    }
    // Delete brand by id
    public function destroy(Request $request)
    {
        Brands::find($request->mahsx)->delete();
        return redirect()->back()->with('status','Xóa hãng sản xuất thành công');
    }
}
