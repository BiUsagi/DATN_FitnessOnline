<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class CommentsController extends Controller
{
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


   public function reportComment(Request $request)
{
    $comment = Comment::find($request->id);

    if ($comment) {
        // Xử lý báo cáo
        $comment->report = $comment->report = 1; // hoặc thay đổi trạng thái báo cáo
        $comment->save();

        return response()->json(['success' => true, 'message' => 'Bình luận đã được báo cáo.']);
    } else {
        // Không tìm thấy bình luận
        return response()->json(['success' => false, 'message' => 'Không tìm thấy bình luận.']);
    }
}

    public function __construct()
    {
        $this->middleware('auth'); // Bảo vệ các route yêu cầu đăng nhập
    }
    // Xóa bình luận
}
