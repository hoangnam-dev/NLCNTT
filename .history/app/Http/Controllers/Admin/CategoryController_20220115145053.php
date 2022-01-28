<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    public $data = [];
    // Show list categories
    public function index() {
        $this->data['title'] = 'Danh sách danh mục';
        $this->data['listCategories'] = Categories::orderBy('MaDM', 'DESC')->paginate(3);
        return view('admin.categories.index',$this->data);
    }
    // Show form insert category
    public function create() {
        $this->data['title'] = 'Thêm danh mục';
        return view('admin.categories.create', $this->data);
    }
    // Insert category to database  
    public function store(Request $request) {
        $rules = [
            'category_name' => 'required|unique:danhmuc,TenDM|min:2',
        ];
        $messages = [
            'category_name.required'=>'Tên danh mục không được để trống',
            'category_name.unique'=>'Tên danh mục đã tồn tại',
            'category_name.min'=>'Tên danh mục phải lớn hơn :min ký tự'
        ];
        $request->validate($rules, $messages);
        
        $categoryModel = new Categories();
        $categoryModel->TenDM = $request->category_name;
        $categoryModel->save(); 

        return redirect()->back()->with('status','Thêm danh mục thành công');
    }
    // Show info category by MaDM
    public function edit(Request $request) {
        $this->data['title'] = 'Chi tiết danh mục';
        $category = Categories::find($request->MaDM);

        return view('admin.categories.edit', $this->data)->with(compact('category'));
    }
    // Update category
    public function update(Request $request) {
        $rules = [
            'category_name' => 'required|min:2',
        ];
        $messages = [
            'category_name.required'=>'Tên danh mục không được để trống',
            'category_name.min'=>'Tên danh mục phải lớn hơn :min ký tự'
        ];
        $request->validate($rules, $messages);
        
        $categoryModel = Categories::find($request->MaDM);
        $categoryModel->TenDM = $request->category_name;
        $categoryModel->save(); 

        return redirect()->back()->with('status','Cập nhật danh mục thành công');
    }
    // Delete category by MaDM
    public function destroy(Request $request)
    {
        Categories::find($request->MaDM)->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công');
    }




}
