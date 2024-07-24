<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lab1Controller;
use App\Http\Controllers\Lab2Controller;
use App\Http\Controllers\Lab3Controller;
use App\Http\Controllers\Lab4Controller;


// Lab 1
Route::get('/', [Lab1Controller::class, 'index']);
Route::get('/thongtinsv', [Lab1Controller::class, 'index']);


// Lab 2
Route::get('/lab221', [Lab2Controller::class, 'lab221']);
Route::get('/lab222', [Lab2Controller::class, 'lab222']);
Route::get('/lab231/{ten}', [Lab2Controller::class, 'lab231']);
Route::get('/lab232/{id}', [Lab2Controller::class, 'lab232']);


// Lab 3
Route::get('/lab3', [Lab3Controller::class, 'index']);
Route::get('/lab3/{id}', [Lab3Controller::class, 'chitiet']);
Route::get('/lab3b1/{ten}', [Lab3Controller::class, 'tintrongloai']);


// Lab 4






// Route::get('ngayba', [
//     NgayBaController::class,
//     'index'
// ])->name('ngayba');



// Route::get('ngayba/{congviec}/{id}', [
//     NgayBaController::class,
//     'detal'
// ])->where([
//             'congviec' => '[a-zA-Z0-9]+',
//             'id' => '[0-9]+'
//         ]);



// Route::get('/', function () {
//     return view('home');
// });


// Route::get('/', function () {
//     return view('welcome');
//     // return env('MY_NAME');
// });

// Route::get('/tinhtich', function () {
//     return view('demoweb');
// });

// Route::get('/aboutMe', function () {
//     return response()->json([
//         'name' => 'SirT',
//         'email' => 'tubanovel@gmail.com'
//     ]);
// });