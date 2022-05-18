<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.permission');
    }
    // List Product Comment
    public function listComments(Request $request) {
        $paginateNumber = 10;
        $this->data['title'] = 'Danh sách đánh giá';
        $this->data['comments'] = Comments::whereNull('parent_id')->with('hasReplyComment')->with('hasProduct')->orderBy('ngaybl', 'DESC')->search()->paginate($paginateNumber);
        // dd($this->data['comments']);
        return view('admin.comment_reply.list_comment', $this->data);
    }

    public function commentDetail(Request $request) {
        $this->data['title'] = 'Chi tiết đánh giá';
        $this->data['comment'] = Comments::where('mabl','=',$request->mabl)->with('hasReplyComment')->with('hasProduct')->with('hasUser')->first();
        return view('admin.comment_reply.comment_detail', $this->data);
    }

    public function replyComment(Request $request) {
        $rules = [
            'comment_reply' => 'required',
        ];
        $messages = [
            'comment_reply.required'=>'Nội dung không được để trống',
        ];
        $request->validate($rules, $messages);
        // dd($request->all());

        $commentModel = new Comments();
        $commentModel->masp = $request->masp;
        $commentModel->parent_id = $request->mabl;
        $commentModel->noidung = $request->comment_reply;
        $commentModel->masp = $request->masp;
        $commentModel->makh = $request->makh;
        $commentModel->manv = Auth::guard('admin')->user()->manv;
        $commentModel->ngaybl = date('Y-m-d H:i:s');

        // dd($commentModel);
        $commentModel->save();
        return redirect()->back()->with('status','Phản hồi đánh giá thành công');
    }

    public function editReply(Request $request) {
        $rules = [
            'comment_reply' => 'required',
        ];
        $messages = [
            'comment_reply.required'=>'Nội dung không được để trống',
        ];
        $request->validate($rules, $messages);

        $commentModel = Comments::find($request->maph);
        $commentModel->noidung = $request->comment_reply;

        $commentModel->save();
        return redirect()->back()->with('status','Sửa phản hồi đánh giá thành công');
    }

    public function destroyComment(Request $request) {
        
        $replyComment = Comments::where('parent_id','=',$request->mabl)->get();
        foreach ($replyComment as $key => $value) {
            $value->delete();
        }
        $commentModel = Comments::find($request->mabl);
        $commentModel->delete();
        return redirect()->back()->with('status','Xóa bình luận thành công');
    }

    public function destroyReply(Request $request) {
        $commentModel = Comments::find($request->mabl);
        $commentModel->delete();
        return redirect()->back()->with('status','Xóa phản hồi thành công');
    }

}
