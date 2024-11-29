<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\Slides;
use App\Models\Staff;
use App\Models\User;
use App\Models\Workout_package;

class HomeController extends Controller
{

    public function index()
    {
        $slides = Slides::orderBy('id', 'DESC')->get(); // Lấy tất cả dữ liệu từ bảng tin
        $PTHot = Staff::withCount('workoutPackages')->orderBy('workout_packages_count', 'desc') // Sắp xếp giảm dần theo số lượng gói tập
        ->get();
        $topPost = Posts::orderBy('id', 'DESC')->get();//lấy bài viết mới nhất nhất
        $top_workout_packages = Workout_package::orderBy('id', 'DESC')->get();//lấy bài viết mới nhất nhất
        $AllPT = staff::all();
        // $TopPost= Posts::orderBy('id', )
        // dd($AllPT); 
        // return view('frontend/index',compact('slides','PTHot','topPost','AllPT'));
        return view('frontend/index')->with([
            'slides' => $slides,
            'PTHot' => $PTHot,
            'topPost' => $topPost,
            'AllPT' => $AllPT,
            'top_workout_packages' => $top_workout_packages
        ]);
    }
    // public function footer()
    // {
    //     $topPost = Posts::orderBy('id', 'DESC')->get();
    //     return view('frontend/layouts/footer')->with([

    //         'topPost' => $topPost

    // ]);
    // }


    public function searchCourse()
    {
        return view('frontend/searchcourse');
    }


    public function about()
    {
        return view('frontend/about');
    }
    public function contact()
    {
        return view('frontend/contact');
    }

}

