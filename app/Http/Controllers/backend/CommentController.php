<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Posts;

class CommentController extends Controller
{
    public function index()
    {
        // $comments = Comment::all();
        // Lấy tất cả dữ liệu từ bảng tin
        // $comments = Comment::with('user')->orderBy('id', 'DESC')->get();
        $comments = Comment::with(['user', 'posts'])->orderBy('id', 'DESC')->get();
        return view('backend/comments/index',compact('comments'));
    }
}
