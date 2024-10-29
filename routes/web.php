<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\frontend\InfoController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ConfigController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ExerciseController;
use App\Http\Controllers\backend\WorkoutPackagesController;
use App\Http\Controllers\backend\PackageExercisesController;
use App\Http\Controllers\backend\MarketingController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostsController;
use App\Http\Controllers\backend\StatisticalController;
use App\Http\Controllers\backend\SupportExercisesController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\ComponentController;
use App\Http\Controllers\backend\AccountsController;
use App\Http\Controllers\backend\SlidesController;
use App\Http\Controllers\ApiController;

// use App\Http\Controllers\backend\api\PackageExercisesController;
// use App\Http\Controllers\backend\api\PackageExercisesController;


//Front End
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact.index');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog.index');
Route::get('/info', [InfoController::class, 'info'])->name('info.index'); //thông tin cá nhân
Route::get('/posts', [HomeController::class, 'posts'])->name('posts.index'); //các post
Route::get('/posts/posts-details/{id}', [HomeController::class, 'posts_details'])->name('posts-details.index');//post chi tiết
//Auth;
Route::post('/login', [LoginController::class, 'login_'])->name('login_.index'); //xử lý input login;
Route::post('/register', [LoginController::class, 'register'])->name('register.index'); //xử lý input register;
Route::post('/logout', [LoginController::class, 'logout'])->name('logout.index'); //xử lý input register;

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


    //Package_exercise
    Route::get('/package_exercise', [PackageExercisesController::class, 'index'])->name('admin.package_exercise');



    Route::get('/order', [OrderController::class, 'index'])->name('admin.order');


    // exerciseset - gói tập
    Route::get('/workout_package', [WorkoutPackagesController::class, 'index'])->name('admin.workout_package');
    // chi tiết gói tập
    Route::get('/workout_package/workout_package_detail/{id}', [WorkoutPackagesController::class, 'detail'])->name('admin.workout_package_detail');
    //create_goitap
    Route::get('/workout_package/create', [WorkoutPackagesController::class, 'create'])->name('admin.workout_package-create');
    //update_goitap
    Route::get('/workout_package/update/{id}', [WorkoutPackagesController::class, 'update'])->name('admin.workout_package-update');


    Route::get('/workout_hub', [WorkoutPackagesController::class, 'workout_hub'])->name('admin.workout_hub');
    
    


    // statistical - thống kê
    Route::get('/statistical', [StatisticalController::class, 'index'])->name('admin.statistical');


    // marketing - tiếp thị
    Route::get('/marketing', [MarketingController::class, 'index'])->name('admin.marketing');

    // supportexercises - chăm sóc khách hàng 
    Route::get('/supportexercises', [SupportExercisesController::class, 'index'])->name('admin.supportexercises');

    // posts - bài viết
    Route::get('/posts', [PostsController::class, 'index'])->name('admin.posts');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('admin-post.create');

    //component 
    Route::get('/component', [ComponentController::class, 'index'])->name('admin.component');

    // order - đơn hàng
    Route::get('/orders', [OrderController::class, 'orders'])->name('admin.orders');
    Route::get('/userorder', [OrderController::class, 'user'])->name('admin.userorder');


    //___________________________________ Rin Lít Đờ __________________________ FaKe ____________________________________//



    //siles
    Route::get('/slides', [SlidesController::class, 'index'])->name('admin.slides');//Danh sách giao diện

    Route::get('/slides/create', [SlidesController::class, 'create'])->name('admin.slide.create');//Thêm giao diện
    Route::post('/slides/create', [SlidesController::class, 'create_']);

    Route::get('/slides/xoa/{id}', [SlidesController::class, 'xoa'])->name('admin.slide.xoa');//xóa giao diện

    Route::get('/slides/update/{id}', [SlidesController::class, 'update'])->name('admin.slide.update');//Cập nhật giao diện
    Route::post('/slides/update/{id}', [SlidesController::class, 'update_']);

    //comments
    Route::get('/comments', [CommentController::class, 'index'])->name('admin.comments');//Danh sách giao diện
    
    //___________________________________ Sơn Lít Đờ __________________________ FaKe ____________________________//



    // accounts - tài khoản
    Route::get('/customer', [AccountsController::class, 'customer_account'])->name('admin.customer');  // Danh sách khách hàng
    Route::get('/customerinfo/{id}', [AccountsController::class, 'customer_info'])->name('admin.customer.info'); // Chi tiết khách hàng

    Route::get('/staff', [AccountsController::class, 'staff_account'])->name('admin.staff'); //Danh sách nhân viên
    Route::get('/staffinfo/{id}', [AccountsController::class, 'staff_info'])->name('admin.staff.info');// Chi tiết nhân viên
    Route::get('/staffupdate/{id}', [AccountsController::class, 'staff_update'])->name('admin.staff.update'); //Cập nhật nhân viên
});


// Route::group(['prefix' => 'api',], function () {
//     // Route::get('goitap', [PackageExercisesController::class, 'index']);



//     // account
//     Route::get('/get-user/{id}', [ApiAccountsController::class, 'getUser'])->name('api.user');
//     Route::post('/update-user', [ApiAccountsController::class, 'updateUser'])->name('api.user.update');
// });