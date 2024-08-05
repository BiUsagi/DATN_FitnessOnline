<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
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



//Front End
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact.index');


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
    Route::get('/marketing', [MarketingController::class, 'index'])->name('admin.marketing');
    Route::get('/order', [OrderController::class, 'index'])->name('admin.order');


    // exerciseset - gói tập
    Route::get('/exerciseset', [ExerciseSetController::class, 'index'])->name('admin.exerciseset');

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

    // accounts - tài khoản
    Route::get('/staff', [OrderController::class, 'orders'])->name('admin.staff');
    Route::get('/customer', [OrderController::class, 'orders'])->name('admin.customer');
});