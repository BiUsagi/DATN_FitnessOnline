<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        return view('backend/posts/index');
    }
    public function create(){
        return view('backend/posts/create');
    }
}
