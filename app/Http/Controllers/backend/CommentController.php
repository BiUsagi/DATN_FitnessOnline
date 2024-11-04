<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function index()
    {
        return view('backend/comments/index');
    }
    public function ReportedComments()
    {
        return view('backend/comments/list-report');
    }
    
    
}