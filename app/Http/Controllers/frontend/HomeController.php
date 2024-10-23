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
        $topPost = Posts::orderBy('id','DESC')->get();//lấy bài viết mới nhất nhất
        $AllPT = staff::all();
        // $TopPost= Posts::orderBy('id', )
        // dd($AllPT); show ra dữ liệu xem trước
        // return view('frontend/index',compact('slides','PTHot','topPost','AllPT'));
        return view('frontend/index')->with([
            'slides' =>$slides,
            'PTHot'=> $PTHot,
            'topPost'=>$topPost,
            'AllPT'=> $AllPT
        ]);
    }
    public function about(){
        return view('frontend/about');
    }
    public function contact(){
        return view('frontend/contact');
    }
    public function blog(){
        return view('frontend/blog');
    }
}
