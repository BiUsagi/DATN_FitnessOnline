<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\OrderController;



//Front End
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact.index');


// Back End
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.order');



