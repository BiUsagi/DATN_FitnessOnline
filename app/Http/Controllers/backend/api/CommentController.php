<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user','posts') // Load thông tin user cho mỗi bình luận
        ->get()
        ->map(function ($comment) {
            return [
                'id' => $comment->id,
                'content' => $comment->content,
                'user_name' => $comment->user->user_name ?? 'N/A', // Lấy tên người dùng
                'avatar' => $comment->user->avatar ?? 'N/A', // Lấy avatar người dùng
                'title'=> $comment->posts->title ?? 'N/A' ,
                'created_at' => $comment->created_at,
            ];
        });

    return response()->json($comments);
    }
}
