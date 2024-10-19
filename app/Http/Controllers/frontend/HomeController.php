<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\Slides;
use App\Models\Staff;

class HomeController extends Controller
{
    
    public function index(){
        $slides = Slides::orderBy('id', 'DESC')->get(); // Lấy tất cả dữ liệu từ bảng tin
        $PTHot = Staff::orderby('id','ASC')->get();//lấy pt có kinh nghiệm nhìu nhất
        $topPost = Posts::orderBy('id','DESC')->get();
        return view('frontend/index',compact('slides','PTHot','topPost'));
    }
    public function about(){
        return view('frontend/about');
    }
    public function contact(){
        return view('frontend/contact');
    }
}
