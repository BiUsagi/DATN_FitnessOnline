<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\WalletsController;
use App\Http\Controllers\frontend\Workout_packageController;
use App\Http\Controllers\backend\WalletController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\frontend\ProfileController;
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
use App\Http\Controllers\backend\DepositHistoriesController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\frontend\AjaxloginController;
use App\Http\Controllers\frontend\CommentsController;
use App\Http\Controllers\frontend\PostController;


// use App\Http\Controllers\backend\api\PackageExercisesController;
// use App\Http\Controllers\backend\api\PackageExercisesController;


//Front End
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact.index');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog.index');
// Route::get('/footer', [HomeController::class, 'footer'])->name('footer.index');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.index'); //thông tin cá nhân
Route::get('/posts', [PostController::class, 'posts'])->name('posts.index'); //các post
Route::get('/posts/posts-details/{id}', [PostController::class, 'posts_details'])->name('posts-details.index');//post chi tiết
Route::get('/trainers', [ProfileController::class, 'trainers'])->name('trainers.index');
Route::get('/trainer/{id}', [ProfileController::class, 'info_trainer'])->name('info.trainer');
Route::get('/staffrequest', [ProfileController::class, 'staff_request'])->name('staff_request.index');



//workout package
Route::get('/workout_detail/{id}', [Workout_packageController::class, 'workout_detail'])->name('workout_detail');
Route::get('/workout_bought/{user_id}', [Workout_packageController::class, 'workout_bought'])->name('workout_bought');

//Auth;
Route::post('/login', [LoginController::class, 'login_'])->name('login_.index'); //xử lý input login;
Route::post('/register', [LoginController::class, 'register'])->name('register.index'); //xử lý input register;
Route::post('/logout', [LoginController::class, 'logout'])->name('logout.index'); //xử lý input register;

Route::get('/login', [LoginController::class, 'index'])->name('login.index'); //link view login
Route::get('/addmoney', [WalletsController::class, 'addmoney'])->name('wallets.addmoney'); //link nạp tiền





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
    Route::get('/exercise/update/{id}', [ExerciseController::class, 'updateExercise'])->name('admin.exercise-update');



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
    //view workout_exercise
    Route::get('/workout_hub/{id}', [WorkoutPackagesController::class, 'workout_hub'])->name('admin.workout_hub');
    // Route::get('/workout_hub/{id}/day/{day_id}', [WorkoutPackagesController::class, 'workout_hub'])->name('admin.workout_hub.detail');




    // statistical - thống kê
    Route::get('/statistical', [StatisticalController::class, 'index'])->name('admin.statistical');
    Route::get('/package', [StatisticalController::class, 'package'])->name('admin.package');


    // marketing - tiếp thị
    Route::get('/marketing', [MarketingController::class, 'index'])->name('admin.marketing');

    // supportexercises - chăm sóc khách hàng 
    Route::get('/supportexercises', [SupportExercisesController::class, 'index'])->name('admin.supportexercises');

    // posts - bài viết
    Route::get('/posts', [PostsController::class, 'index'])->name('admin.posts');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('admin.post-create');
    Route::get('/posts/update/{id}', [PostsController::class, 'update'])->name('admin.posts-update');

    //component 
    Route::get('/component', [ComponentController::class, 'index'])->name('admin.component');


    // wallets
    Route::get('/deposithistories', [DepositHistoriesController::class, 'index'])->name('admin.addmoney');
    Route::get('/deposithistories/list', [DepositHistoriesController::class, 'list'])->name('admin.listmoney');




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
    Route::get('/report-comments', [CommentController::class, 'ReportedComments'])->name('api.admin.report-comments');


    //___________________________________ Sơn Lít Đờ __________________________ FaKe ____________________________//



    // accounts - tài khoản
    Route::get('/customer', [AccountsController::class, 'customer_account'])->name('admin.customer');  // Danh sách khách hàng
    Route::get('/customerinfo/{id}', [AccountsController::class, 'customer_info'])->name('admin.customer.info'); // Chi tiết khách hàng

    Route::get('/staff', [AccountsController::class, 'staff_account'])->name('admin.staff'); //Danh sách nhân viên
    Route::get('/staffinfo/{id}', [AccountsController::class, 'staff_info'])->name('admin.staff.info');// Chi tiết nhân viên
    Route::get('/staffupdate/{id}', [AccountsController::class, 'staff_update'])->name('admin.staff.update'); //Cập nhật nhân viên

    Route::get('/application', [AccountsController::class, 'application'])->name('admin.application'); //Danh sách đơn đăng ký
    Route::get('/application/{id}', [AccountsController::class, 'application_info'])->name('admin.application.info'); //Chi tiết đơn đăng ký


    // order - đơn hàng
    Route::get('/orders', [OrderController::class, 'orders'])->name('admin.orders'); //Danh sách đơn hàng
    Route::get('/orders/{id}', [OrderController::class, 'info_order'])->name('admin.info.orders'); // Chi tiết đơn hàng
    Route::get('/userorder', [OrderController::class, 'user'])->name('admin.userorder');



});


// Route::group(['prefix' => 'api',], function () {
//     // Route::get('goitap', [PackageExercisesController::class, 'index']);



//     // account
//     Route::get('/get-user/{id}', [ApiAccountsController::class, 'getUser'])->name('api.user');
//     Route::post('/update-user', [ApiAccountsController::class, 'updateUser'])->name('api.user.update');
// });

Route::group(['prefix' => 'ajax'], function () {
    route::post('/login', [AjaxloginController::class, 'login'])->name('ajax.login');
    route::get('/logout', [AjaxloginController::class, 'logout'])->name('ajax.logout');
    route::post('/comment/{id}', [CommentsController::class, 'comment'])->name('ajax.comment');
    Route::post('/report-comment', [CommentsController::class, 'reportComment'])->name('comment.report');


});
