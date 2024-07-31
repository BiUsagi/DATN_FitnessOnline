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



//Front End
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact.index');


// Back End
//Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/config', [ConfigController::class, 'index'])->name('admin.config');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/exercise', [ExerciseController::class, 'index'])->name('admin.exercise');
    Route::get('/exerciseset', [ExerciseSetController::class, 'index'])->name('admin.exerciseset');
    Route::get('/marketing', [MarketingController::class, 'index'])->name('admin.marketing');
    Route::get('/posts', [PostsController::class, 'index'])->name('admin.posts');
    Route::get('/statistical', [StatisticalController::class, 'index'])->name('admin.statistical');
    Route::get('/supportexercises', [SupportExercisesController::class, 'index'])->name('admin.supportexercises');
    Route::get('/comments', [CommentController::class, 'index'])->name('admin.comments');


    // order
    Route::get('/orders', [OrderController::class, 'orders'])->name('admin.orders');
    Route::get('/customer', [OrderController::class, 'customer'])->name('admin.customer');
});