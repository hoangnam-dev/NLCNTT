<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeDetail;
use App\Models\Attributes;
use App\Models\Products;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    public function __construct()
    {
        $this->middleware('product.permission');
    }
    public $data = [];
    public $paginateNumber = 10;

    // Show list attributes
    public function index() {
        $this->data['title'] = 'Danh sách thuộc tính';
        $this->data['listAttributes'] = Attributes::orderBy('matt', 'ASC')->search()->paginate($this->paginateNumber);
        return view('admin.others.attributes.index',$this->data);
    }
    // Show form insert attribute
    public function create() {
        $this->data['title'] = 'Thêm thuộc tính';
        return view('admin.others.attributes.create', $this->data);
    }
    // Insert attribute to database  
    public function store(Request $request) {
        // dd($request->all());
        $rules = [
            'tentt' => 'required',
        ];
        $messages = [
            'tentt.required'=>'Tên thuộc tính không được để trống',
        ];
        $request->validate($rules, $messages);
        
        $attributeModel = new Attributes();
        $attributeModel->tentt = $request->tentt;
        $attributeModel->save(); 

        return redirect()->back()->with('status','Thêm thuộc tính thành công');
    }

    public function storeDetail(Request $request) {
        // dd($request->all());
        $rules = [
            'giatri' => 'required',
        ];
        $messages = [
            'giatri.required'=>'Tên thuộc tính không được để trống',
        ];
        $request->validate($rules, $messages);
        $attrDetailModel = new AttributeDetail();
        $attrDetailModel->matt = $request->matt;
        $attrDetailModel->giatri = $request->giatri;
        $attrDetailModel->save();
        $attributes = Attributes::orderBy('matt', 'ASC')->with('hasAttributeDetail')->get();
        $attributeComponent = view('admin.products.attributes',compact('attributes'))->render();
        
        return response()->json(['status'=>'success', 'attributeComponent'=>$attributeComponent]);
    }

    // Show info attribute by matt
    public function edit(Request $request) {
        $this->data['title'] = 'Chi tiết thuộc tính';
        // $attribute = Attributes::find($request->matt);
        $attribute = Attributes::where('matt', $request->matt)->with('hasAttributeDetail')->first();
        // dd($attribute);

        return view('admin.others.attributes.edit', $this->data)->with(compact('attribute'));
    }
    // Update attribute
    public function update(Request $request) {
        $rules = [
            'tentt' => 'required',
        ];
        $messages = [
            'tentt.required'=>'Tên thuộc tính không được để trống',
        ];
        $request->validate($rules, $messages);
        
        $attributeModel = Attributes::find($request->matt);
        $attributeModel->tentt = $request->tentt;
        $attributeModel->save(); 

        return redirect()->back()->with('status','Cập nhật thuộc tính thành công');
    }

    // Add attribute detail
    public  function addDetail(Request $request) {
        $rules = [
            'giatri' => 'required',
        ];
        $messages = [
            'giatri.required'=>'Tên thuộc tính không được để trống',
        ];
        $request->validate($rules, $messages);
        $attrDetailModel = new AttributeDetail();
        $attrDetailModel->matt = $request->matt;
        $attrDetailModel->giatri = $request->giatri;

        return redirect()->back()->with('status','Thêm giá trị thuộc tính thành công');
    }

    // Add attribute detail
    public  function deleteDetail(Request $request) {
        $attrDetailModel = AttributeDetail::find($request->macttt)->delete();

        return redirect()->back()->with('status','Xóa giá trị thuộc tính thành công');
    } 

    // Delete attribute by matt
    public function destroy(Request $request)
    {
        $attribute = Attributes::find($request->matt);
        if($attribute) {
            $attribute->hasAttributeDetail()->delete();
            $attribute->delete();
        }
        return redirect()->back()->with('status','Xóa thuộc tính thành công');
    }

}