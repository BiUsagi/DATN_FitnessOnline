<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all(); // Lấy tất cả dữ liệu từ bảng tin
        return view('backend/comments/index',compact('comments'));
    }

}
