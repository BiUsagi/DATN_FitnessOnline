<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slides;
class HomeController extends Controller
{
    
    public function index(){
        $slides = Slides::orderBy('id', 'DESC')->get(); // Lấy tất cả dữ liệu từ bảng tin
        // return view('/',compact('slides'));
        return view('frontend/index',compact('slides'));
    }
    public function about(){
        return view('frontend/about');
    }
    public function contact(){
        return view('frontend/contact');
    }
}
