<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
                'content'  =>  $req->content
                
            ];
            
            if ($Comment= Comment::create($data)){
                $Comments = Comment::where(['posts_id' => $posts_id, 'rep' => 0])->orderBy('id','DESC')->get();
                return view('frontend.posts.list-comment',compact('Comments'));

            }
        }
        
        
        return response()->json(['error'=>$validator->errors()->first()]);
    }
     
}
