<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\api\PackageExercisesController;
use App\Http\Controllers\backend\api\ExerciseController;
use App\Http\Controllers\backend\api\AccountsController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'admin',], function (){
    //API of exercises
    Route::get('/exercises', [ExerciseController::class, 'index']);
    Route::post('/exercises', [ExerciseController::class, 'add']);
    Route::get('/exercises/:id', [ExerciseController::class, 'add']);
    Route::put('/exercises/:id', [ExerciseController::class, 'add']);
    Route::delete('/exercises/:id', [ExerciseController::class, 'add']);





Route::group(['prefix' => 'admin',], function () {
    Route::get('/baitap', [ExerciseController::class, 'index']);

});


// account
Route::get('/get-user/{id}', [AccountsController::class, 'getUser'])->name('api.user');
Route::post('/update-user', [AccountsController::class, 'updateUser'])->name('api.user.update');