<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $data = [];
    public $paginateNumber = 10;

    public function index(Request $request) {
        $this->data['title'] = 'Quản lý tin tức';
        $this->data['news'] = News::orderBy('ngaydang')->paginate($this->paginateNumber);
        return view('admin.news.index', $this->data);
    }

    public function create() {
        $this->data['title'] = 'Thêm tin tức';
        return view('admin.news.create', $this->data);
    }

    public function store(Request $request) {
        // dd($request->all());
        $rules = [
            'news_title' => 'required',
            'news_content' => 'required',
            'news_avatar' =>'image|mimes:jpg,png,jpeg,gif,svg',
        ];
        $messages = [
            'news_title.required'=>'Tiêu đề không được để trống',
            'news_content.required'=>'Nội dung không được để trống',
            'news_avatar.image'=>'Hãy chọn file hình ảnh',
            'news_avatar.mimes'=>'Hãy chọn file hình ảnh',
        ];
        $request->validate($rules, $messages);

        $news = new News();
        $news->tieude = $request->news_title;
        $news->noidung = $request->news_content;
        $news->ngaydang = date('Y-m-d H:i:s');

        if(isset($request->news_avatar)) {
            $imageName = $request->news_avatar->getClientOriginalName();
            $path = "assets/uploads/news/".$imageName; // kiem tra anh ton tai
            if(!file_exists($path)) {
                if(!$this->uploadImage($request->news_avatar, $imageName)) {
                    return redirect()->back()->with('status','error')->with('sttContent','Upload ảnh tin tức không thành công');
                }
            }
            $news_image = $imageName;
        }
        else {
            $news_image = 'no-image.png';
        }

        $news->anh = $news_image;
        if($news->save()) {
            $status = 'success';
            $sttContent = 'Thêm tin tức thành công';
        }
        else {
            $status = 'error';
            $sttContent = 'Thêm tin tức không thành công';
        }
        return redirect()->back()->with('status',$status)->with('sttContent', $sttContent);
    }

    public function edit(Request $request) {
        $this->data['title'] = 'Sửa tin tức';
        $this->data['news'] = News::find($request->matin);
        return view('admin.news.edit', $this->data);
    }

    public function update(Request $request) {
        // dd($request->all());
        $rules = [
            'news_title' => 'required',
            'news_content' => 'required',
            'news_avatar' =>'image|mimes:jpg,png,jpeg,gif,svg',
        ];
        $messages = [
            'news_title.required'=>'Tiêu đề không được để trống',
            'news_content.required'=>'Nội dung không được để trống',
            'news_avatar.image'=>'Hãy chọn file hình ảnh',
            'news_avatar.mimes'=>'Hãy chọn file hình ảnh',
        ];
        $request->validate($rules, $messages);

        $news_image = $request->news_image;
        if(isset($request->news_avatar)) {
            $imageName = $request->news_avatar->getClientOriginalName();
            $path = "assets/uploads/news/".$imageName;
            if(!file_exists($path)) {
                if(!$this->uploadImage($request->news_avatar, $imageName)) {
                    return redirect()->back()->with('status','Upload ảnh tin tức không thành công');
                }
            }
            $news_image = $imageName;
        }

        $news = News::find($request->matin);
        // dd($request->matin);
        $news->tieude = $request->news_title;
        $news->noidung = $request->news_content;
        $news->update_at = date('Y-m-d H:i:s');
        $news->anh = $news_image;
        if($news->save()) {
            $status = 'success';
            $sttContent = 'Cập nhật tin tức thành công';
        }
        else {
            $status = 'error';
            $sttContent = 'Cập nhật tin tức không thành công';
        }
        return redirect()->back()->with('status',$status)->with('sttContent', $sttContent);
    }

    public function destroy(Request $request) {
        $news = News::find($request->matin);
        $img_path = "assets/uploads/news/".$news->anh;
        if(file_exists($img_path)) {
            unlink($img_path);
        }
        if($news->delete()) {
            $status = 'success';
            $sttContent = 'Xóa tin tức thành công';
        }
        else {
            $status = 'error';
            $sttContent = 'Xóa tin tức không thành công';
        }
        return redirect()->route('admin.news')->with('status',$status)->with('sttContent', $sttContent);
    }

    
    // Upload Image
    public function uploadImage($avatar, $imgName) {
        $flag = false;
        $path = "assets/uploads/news/";
        if($avatar->move($path,$imgName)) {
            $flag = true;
        }
        return $flag;
    }
}
