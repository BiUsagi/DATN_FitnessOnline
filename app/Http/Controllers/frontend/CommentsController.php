<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class CommentsController extends Controller
{
    // public function comment(Request $req){
    //     $user_id = Auth::guard('web')->user()->id;
    //     $validator = Validator::make($req->all(),[
    //         'comments' => 'required',
    //     ],[
    //         'comments.required'=>'Bình luận không được để trống', 
    //     ]);
    //     if ($validator->passes()){
    //         $data = [
    //             'user_id'  =>  $user_id,
    //             'posts_id' => $posts_id,
    //             'content'  =>  $req->$content,

    //         ];
    //         if ($check_login){
    //             if (Auth::guard('web')->user()->status ==0){
    //                 return response()->json(['error'=>['tài khoản của bạn chưa xác thực']]);
    //             }

    //             return response()->json(['data'=>Auth::guard('web')->user()]);

    //         }
    //     }
        
        
    //     return response()->json(['error'=>$validator->errors()->first()]);
    // }
    
}
