<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slides;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
    public function index()
    {
        $slides = Slides::all(); // Lấy tất cả dữ liệu từ bảng tin
        return view('backend/slides/index',compact('slides'));
    }
    public function create(){
        return view('backend/slides/create');
    }
}
