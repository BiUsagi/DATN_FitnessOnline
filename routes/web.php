<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ConfigController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ExerciseController;
use App\Http\Controllers\backend\ExerciseSetController;
use App\Http\Controllers\backend\MarketingController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostsController;
use App\Http\Controllers\backend\StatisticalController;
use App\Http\Controllers\backend\SupportExercisesController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\ComponentController;
use App\Http\Controllers\backend\AccountsController;
use App\Http\Controllers\backend\SlidesController;

//Front End
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact.index');

//Auth;
Route::post('/login', [LoginController::class, 'login_'])->name('login.index'); //xử lý input login;
Route::post('/rigister', [LoginController::class, 'rigister_'])->name('rigister.index'); //xử lý input register;

Route::get('/login', [LoginController::class, 'index'])->name('login.index'); //link view login



// Back End
//Admin
Route::prefix('admin')->group(function () {

    // dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    // config - cấu hình
    Route::get('/config', [ConfigController::class, 'index'])->name('admin.config');


    // exercise - bài tập
    Route::get('/exercise', [ExerciseController::class, 'index'])->name('admin.exercise');

    Route::get('/exercise/create', [ExerciseController::class, 'createExercise'])->name('admin.exercise-create');
    Route::post('/exercise/create_', [ExerciseController::class, 'add'])->name('admin.exercise-add');


    Route::get('/order', [OrderController::class, 'index'])->name('admin.order');


    // exerciseset - gói tập
    Route::get('/exerciseset', [ExerciseSetController::class, 'index'])->name('admin.exerciseset');
    //create_goitap
    Route::get('/exerciseset/create', [ExerciseSetController::class, 'create'])->name('admin.exerciseset-create');
    Route::post('/exerciseset/create', [ExerciseSetController::class, 'create_'])->name('admin.exerciseset-create_');
    //update_goi_tap
    Route::get('/exerciseset/update', [ExerciseSetController::class, 'update'])->name('admin.exerciseset-update');

    Route::post('/exerciseset/create', [ExerciseSetController::class, 'create_'])->name('admin.exerciseset-create_');

    // statistical - thống kê
    Route::get('/statistical', [StatisticalController::class, 'index'])->name('admin.statistical');


    // marketing - tiếp thị
    Route::get('/marketing', [MarketingController::class, 'index'])->name('admin.marketing');

    // supportexercises - chăm sóc khách hàng 
    Route::get('/supportexercises', [SupportExercisesController::class, 'index'])->name('admin.supportexercises');

    // posts - bài viết
    Route::get('/posts', [PostsController::class, 'index'])->name('admin.posts');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('admin.create');

    // comments - bình luận
    Route::get('/comments', [CommentController::class, 'index'])->name('admin.comments');

    //component 
    Route::get('/component', [ComponentController::class, 'index'])->name('admin.component');

    // order - đơn hàng
    Route::get('/orders', [OrderController::class, 'orders'])->name('admin.orders');
    Route::get('/userorder', [OrderController::class, 'user'])->name('admin.userorder');


    //___________________________________ Rin Lít Đờ __________________________ FaKe ____________________________________//
    //siles
    Route::get('/slides', [SlidesController::class, 'index'])->name('admin.slides');
    Route::get('/slides/create', [SlidesController::class, 'create'])->name('admin.slide.create');
    Route::post('/slides/create', [SlidesController::class, 'create_']);
    Route::get('/slides/xoa/{id}',[SlidesController::class,'xoa'])->name('admin.slide.xoa');
    Route::get('/slides/update/{id}',[SlidesController::class,'update'])->name('admin.slide.update');
    Route::post('/slides/update/{id}',[SlidesController::class,'update_']);
    Route::get('/slides/xoa/{id}', [SlidesController::class, 'xoa'])->name('admin.xoa');
    Route::get('/slides/update/{id}', [SlidesController::class, 'update'])->name('admin.update');
    Route::get('/slides/xoa/{id}', [SlidesController::class, 'xoa'])->name('admin.xoa');
    Route::get('/slides/update/{id}', [SlidesController::class, 'update'])->name('admin.update');
    Route::post('/slides/update/{id}', [SlidesController::class, 'update_']);



    //___________________________________ Sơn Lít Đờ __________________________ FaKe ____________________________//




    // accounts - tài khoản
    Route::get('/staff', [AccountsController::class, 'staff_account'])->name('admin.staff'); //Danh sách nhân viên
    Route::get('/customer', [AccountsController::class, 'customer_account'])->name('admin.customer');  // Danh sách khách hàng
    Route::get('/staffinfo', [AccountsController::class, 'staff_info'])->name('admin.staff.info'); // Chi tiết nhân viên 
    Route::get('/customerinfo/{id}', [AccountsController::class, 'customer_info'])->name('admin.customer.info'); // Chi tiết khách hàng
    Route::get('/get-user/{id}', [AccountsController::class, 'getUser'])->name('admin.customer.edit'); // Lấy thông tin khách hàng theo id
    Route::post('/update-user', [AccountsController::class, 'updateUser'])->name('admin.customer.update'); // Cập nhật thông tin khách hàng lên csdl
});