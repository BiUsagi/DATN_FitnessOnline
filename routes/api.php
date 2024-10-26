<?php

use App\Models\voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\api\PackageExercisesController;
use App\Http\Controllers\backend\api\ExerciseController;
use App\Http\Controllers\backend\api\SupportExercisesController;
use App\Http\Controllers\backend\api\Workout_PackageController;
use App\Http\Controllers\backend\api\AccountsController;
use App\Http\Controllers\backend\api\VoucherController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'admin',], function () {
    //API of exercises
    Route::get('/exercises', [ExerciseController::class, 'index']);
    Route::post('/exercises', [ExerciseController::class, 'add']);
    Route::get('/exercises/{id}', [ExerciseController::class, 'add']);
    Route::put('/exercises/{id}', [ExerciseController::class, 'add']);
    Route::delete('/exercises/{id}', [ExerciseController::class, 'add']);

    //API of workout_exercise
    Route::post('/workout_package', [Workout_PackageController::class, 'create_']);  
    Route::get('/workout_package', [Workout_PackageController::class, 'index']);
    Route::get('/workout_package/{id}', [Workout_PackageController::class, 'workout_detail'])->name('workout_package-detail');


    // account
    Route::get('/user/{id}', [AccountsController::class, 'show'])->name('api.user.show');
    Route::put('/user/{id}', [AccountsController::class, 'update'])->name('api.user.update');

    //SupportExercises
    Route::get('/supportexercises', [SupportExercisesController::class, 'index']);
    Route::get('/supportexercises/{id}', [SupportExercisesController::class, 'show']);

    //vouchers
    Route::get('/vouchers', [VoucherController::class, 'index']);
    Route::get('/vouchers/{id}', [VoucherController::class, 'show']);
    Route::post('/vouchers', [VoucherController::class, 'add']);
    Route::delete('/vouchers/{id}', [VoucherController::class, 'delete']);
    Route::put('/vouchers/{id}', [VoucherController::class, 'update']);

});
