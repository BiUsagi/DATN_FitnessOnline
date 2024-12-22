<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class CommentsController extends Controller
{
    //Show comment
    public function comment($posts_id, Request $req){
        $user_id = Auth::guard('web')->user()->id;
        $validator = Validator::make($req->all(),[
            'content' => 'required',
        ],[
            'content.required'=>'Bình luận không được để trống', 
        ]);
        if ($validator->passes()){
            $data = [
                'user_id'  =>  $user_id,
                'posts_id' => $posts_id,
                'rep' => $req->rep ? $req->rep : 0,
                'content'  =>  $req->content
                
            ];
            
            if ($Comment= Comment::create($data)){
                $Comments = Comment::where(['posts_id' => $posts_id, 'rep' => 0])->orderBy('id','DESC')->get();
                return view('frontend.posts.list-comment',compact('Comments'));

            }
        }
        
        
        return response()->json(['error'=>$validator->errors()->first()]);
    }

    //Report comment
    public function reportComment(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'report_content' => 'required|string|max:255',
        ]);

        $comment = Comment::findOrFail($request->comment_id);

        // Lưu thông tin báo cáo
        Report::create([
            'comment_id' => $comment->id,
            'reported_by' => Auth::id(),
            'report_content' => $request->report_content,
        ]);

        // Tăng số lần báo cáo trong bảng `comments`
        $comment->increment('report');

        return response()->json(['message' => 'Báo cáo bình luận thành công!']);
    } 


     // Bảo vệ các route yêu cầu đăng nhập
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Update bình luận
    public function updateComment(Request $request, $commentId) {
        $comment = Comment::find($commentId);
    
        if ($comment && $comment->user_id === Auth::id()) {
            $comment->content = $request->content;
            $comment->save();
            return response()->json(['success' => true, 'message' => 'Bình luận đã được cập nhật.']);
        }
    
        return response()->json(['success' => false, 'message' => 'Không thể cập nhật bình luận.']);
    }

    //Xóa comment
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        // Kiểm tra người dùng có quyền xóa
        if ($comment && $comment->user_id === Auth::id()) {  // Kiểm tra người dùng có quyền xóa
            // Xóa tất cả bình luận con (nếu có)
            $comment->replies()->delete();
            // Xóa bình luận cha
            $comment->delete();
            return response()->json(['success' => true, 'message' => 'Bình luận đã được xóa.']);
        }
        return response()->json(['success' => false, 'message' => 'Không tìm thấy bình luận hoặc không có quyền xóa.']);
    }

    public function updateReply(Request $request, $id)
    {
        $comment = Comment::find($id);

        if ($comment && $comment->user_id === Auth::id()) {  // Kiểm tra quyền sửa
            // Cập nhật nội dung bình luận con
            $comment->content = $request->content;
            $comment->save();

            return response()->json(['success' => true, 'message' => 'Bình luận con đã được sửa.', 'content' => $comment->content]);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy bình luận con hoặc không có quyền sửa.']);
    }
    
    public function deleteReply($id)
    {
        $comment = Comment::find($id);

        if ($comment && $comment->user_id === Auth::id()) {  // Kiểm tra quyền xóa
            // Xóa bình luận con
            $comment->delete();

            return response()->json(['success' => true, 'message' => 'Bình luận con đã được xóa.']);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy bình luận con hoặc không có quyền xóa.']);
    }

}
