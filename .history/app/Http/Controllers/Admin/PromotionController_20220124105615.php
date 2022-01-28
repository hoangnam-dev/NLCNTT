<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    public $data = [];
    // Show list promotion
    public function index() {
        $this->data['title'] = 'Khuyến mãi';
        $this->data['listPromotion'] = DB::table('khuyenmai')->orderBy('makm','DESC')->get();
        return view('admin.promotions.index', $this->data);
    }
    // Show form insert promotion
    public function create() {
        $this->data['title'] = 'Thêm khuyến mãi';
        return view('admin.promotions.create', $this->data);
    }
    // Insert promotion to database  
    public function store(Request $request) {
        $rules = [
            'promotion_name' => 'required|min:2',
            'promotion_value' => 'required',
            'promotion_begin' => 'required',
            'promotion_end' => 'required',
        ];
        $messages = [
            'promotion_name.required'=>'Tên khuyến mãi không được để trống',
            'promotion_name.min'=>'Tên khuyến mãi phải lớn hơn :min ký tự',
            'promotion_value.required'=>'Giá trị khuyến mãi không được để trống',
            'promotion_begin.required'=>'Ngày bắt đầu khuyến mãi không được để trống',
            'promotion_end.required'=>'Ngày kết thúc khuyến mãi không được để trống',
        ];
        $request->validate($rules, $messages);
        
        $promotionModel = new Promotion();
        $promotionModel->tenkm = $request->promotion_name;
        $promotionModel->giatri = $request->promotion_value;
        $promotionModel->ngaybd = $request->promotion_begin;
        $promotionModel->ngaykt = $request->promotion_end;
        $promotionModel->save();

        return redirect()->back()->with('status','Thêm khuyến mãi thành công');
    }
    // Show info promotion by makm
    public function edit(Request $request) {
        $this->data['title'] = 'Chi tiết khuyến mãi';
        $this->data['promotion'] = Promotion::find($request->makm);

        return view('admin.promotions.edit', $this->data);
    }
    // Update promotion
    public function update(Request $request) {
        $rules = [
            'promotion_name' => 'required|min:2',
            'promotion_value' => 'required',
            'day_begin' => 'required',
            'time_begin' => 'required',
            'day_end' => 'required',
            'time_end' => 'required',
        ];
        $messages = [
            'promotion_name.required'=>'Tên khuyến mãi không được để trống',
            'promotion_name.min'=>'Tên khuyến mãi phải lớn hơn :min ký tự',
            'promotion_value.required'=>'Giá trị khuyến mãi không được để trống',
            'day_begin.required'=>'Ngày bắt đầu khuyến mãi không được để trống',
            'time_begin.required'=>'Giờ bắt đầu khuyến mãi không được để trống',
            'day_end.required'=>'Ngày kết thúc khuyến mãi không được để trống',
            'time_end.required'=>'Giờ kết thúc khuyến mãi không được để trống',
        ];
        $request->validate($rules, $messages);
        
        $promotionModel = Promotion::find($request->makm);
        $promotionModel->tenkm = $request->promotion_name;
        $promotionModel->giatri = $request->promotion_value;
        $promotionModel->ngaybd = date_create_from_format('Y-m-d H:i',$request->day_begin." ".$request->time_begin);
        $promotionModel->ngaykt = date_create_from_format('Y-m-d H:i',$request->day_end." ".$request->time_end);
        $promotionModel->save();

        return redirect()->back()->with('status','Cập nhật khuyến mãi thành công');
    }
    // Delete promotion by makm
    public function destroy(Request $request)
    {
        Promotion::find($request->makm)->delete();
        return redirect()->back()->with('status','Xóa khuyến mãi thành công');
    }

}
