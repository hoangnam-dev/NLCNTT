<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    public $data = [];
    public $paginateNumber = 10;

    // Show list Sliders
    public function index()
    {
        $this->data['title'] = 'Danh sách slider';
        $this->data['listSliders'] = Sliders::orderBy('maslider', 'DESC')->search()->paginate($this->paginateNumber);
        return view('admin.sliders.index', $this->data);
    }
    // Show form insert slider
    public function create()
    {
        $this->data['title'] = 'Thêm slider';
        return view('admin.sliders.create', $this->data);
    }
    // Insert slider to database  
    public function store(Request $request)
    {
        // dd($request->all());
        // $rules = [
        //     'slider' => 'image|mimes:jpg,png,jpeg,gif,svg',
        // ];
        // $messages = [
        //     'slider.image' => 'Hãy chọn file hình ảnh',
        //     'slider.mimes' => 'Hãy chọn file có đuôi jpg, png, jpeg, gif, svg',
        // ];
        // $request->validate($rules, $messages);

        $sliderModel = new Sliders();
        $sliderModel->link = $request->link;

        if (isset($request->slider)) {
            $imageName = $request->slider->getClientOriginalName();
            $path = "assets/uploads/sliders/" . $imageName; // kiem tra anh ton tai
            if (!file_exists($path)) {
                if (!$this->uploadImage($request->slider, $imageName)) {
                    $status = 'error';
                    $sttContent = 'Cập nhật slider không thành công';
                    return redirect()->back()->with('status', $status)->with('sttContent', $sttContent);
                }
            }
            $news_image = $imageName;
        } else {
            $status = 'error';
            $sttContent = 'Không có file hình ảnh';
            return redirect()->back()->with('status', $status)->with('sttContent', $sttContent);
        }

        $sliderModel->slider = $news_image;
        $sliderModel->save();

        $status = 'success';
        $sttContent = 'Thêm slider thành công';
        return redirect()->back()->with('status', $status)->with('sttContent', $sttContent);
    }
    // Show info slider by id
    public function edit(Request $request)
    {
        $this->data['title'] = 'Chi tiết slider';
        $this->data['slider'] = Sliders::find($request->maslider);

        return view('admin.sliders.edit', $this->data);
    }
    // Update slider
    public function update(Request $request)
    {

        $new_slider = $request->old_slider;
        if (isset($request->slider)) {
            // dd( $request->slider);
            $rules = [
                // 'slider' => 'image|mimes:jpg,png,jpeg,gif,svg',
                'slider' => 'image',
            ];
            $messages = [
                'slider.image' => 'Hãy chọn file hình ảnh',
                // 'slider.mimes' => 'Hãy chọn file có đuôi jpg, png, jpeg, gif, svg',
            ];
            // dd($request->validate($rules, $messages));
            $request->validate($rules, $messages);
            $imageName = $request->slider->getClientOriginalName();
            $path = "assets/uploads/sliders/" . $imageName;
            if (!file_exists($path)) {
                if (!$this->uploadImage($request->slider, $imageName)) {
                    $status = 'error';
                    $sttContent = 'Cập nhật slider không thành công';
                    return redirect()->back()->with('status', $status)->with('sttContent', $sttContent);
                }
            }
            $new_slider = $imageName;
        }

        $slider = Sliders::find($request->maslider);
        // dd($slider);
        $slider->link = $request->link;
        $slider->slider = $new_slider;
        if ($slider->save()) {
            $status = 'success';
            $sttContent = 'Cập nhật slider thành công';
        } else {
            $status = 'error';
            $sttContent = 'Cập nhật slider không thành công';
        }

        return redirect()->back()->with('status', $status)->with('sttContent', $sttContent);
    }
    // Delete slider by id

    public function destroy(Request $request)
    {
        $slider = Sliders::find($request->maslider);
        $img_path = "assets/uploads/sliders/" . $slider->slider;
        if (file_exists($img_path)) {
            unlink($img_path);
        }
        if ($slider->delete()) {
            $status = 'success';
            $sttContent = 'Xóa slider thành công';
        } else {
            $status = 'error';
            $sttContent = 'Xóa slider không thành công';
        }
        return redirect()->route('admin.sliders')->with('status', $status)->with('sttContent', $sttContent);
    }


    // Upload Image
    public function uploadImage($avatar, $imgName)
    {
        $flag = false;
        $path = "assets/uploads/sliders/";
        if ($avatar->move($path, $imgName)) {
            $flag = true;
        }
        return $flag;
    }
}
