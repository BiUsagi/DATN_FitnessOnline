<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\api\PackageExercisesController;
use App\Http\Controllers\backend\api\ExerciseController;
use App\Http\Controllers\backend\api\AccountsController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'admin',], function () {
    //API of exercises
    Route::get('/exercises', [ExerciseController::class, 'index']);
    Route::post('/exercises', [ExerciseController::class, 'add']);
    Route::get('/exercises/:id', [ExerciseController::class, 'add']);
    Route::put('/exercises/:id', [ExerciseController::class, 'add']);
    Route::delete('/exercises/:id', [ExerciseController::class, 'add']);

    // account
    Route::get('/user/{id}', [AccountsController::class, 'show'])->name('api.user.show');
    Route::put('/user/{id}', [AccountsController::class, 'update'])->name('api.user.update');
});