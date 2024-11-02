<?php

use App\Models\voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//backend
use App\Http\Controllers\backend\api\PackageExercisesController;
use App\Http\Controllers\backend\api\ExerciseController;
use App\Http\Controllers\backend\api\SupportExercisesController;
use App\Http\Controllers\backend\api\Workout_PackageController;
use App\Http\Controllers\backend\api\AccountsController;
use App\Http\Controllers\backend\api\VoucherController;
use App\Http\Controllers\backend\api\CommentController;
use App\Http\Controllers\backend\api\PostController;
use App\Http\Controllers\Backend\api\Workout_hubController;
use App\Http\Controllers\backend\api\WalletController;
use App\Http\Controllers\backend\api\DepositHistoriesController;



//frontend
use App\Http\Controllers\frontend\api\WalletsController;



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
    Route::get('/workout_package', [Workout_PackageController::class, 'index']);
    Route::post('/workout_package', [Workout_PackageController::class, 'create_']);
    Route::post('/workout_package/{id}', [Workout_PackageController::class, 'update_']);
    Route::delete('/workout_package/{id}', [Workout_PackageController::class, 'delete']);
    Route::get('/workout_package/{id}', [Workout_PackageController::class, 'workout_detail'])->name('workout_package-detail');

    //get exercise from package_exercise
    Route::get('get_exercise', [Workout_PackageController::class, 'get_exercises']);
    Route::post('workout_package/{id}/day/{day}/exercises', [PackageExercisesController::class, 'saveExercises']);
    Route::get('workout_package/{packageId}/day/{dayNumber}/exercises', [Workout_PackageController::class, 'getExercisesForDay']);
    Route::get('/api/admin/workout_package/{id}/days', [Workout_PackageController::class, 'getDaysWithExerciseCount']);

    //run view workout_hub
    Route::get('/workout_hub/{id}/day/{dayDetail}', [Workout_hubController::class, 'getDayExercises']);



    // account
    Route::get('/user/{id}', [AccountsController::class, 'showU'])->name('api.user.show');
    Route::put('/user/{id}', [AccountsController::class, 'updateU'])->name('api.user.update');
    Route::get('/staff/{id}', [AccountsController::class, 'showS'])->name('api.staff.show');
    Route::put('/staff/{id}', [AccountsController::class, 'updateS'])->name('api.staff.update');
    Route::post('/application/{id}/approve', [AccountsController::class, 'approve'])->name('api.staffrequests.approve');
    Route::post('/application/{id}/reject', [AccountsController::class, 'reject'])->name('api.staffrequests.reject');

    //SupportExercises
    Route::get('/supportexercises', [SupportExercisesController::class, 'index']);
    Route::get('/supportexercises/{id}', [SupportExercisesController::class, 'show']);

    //vouchers
    Route::get('/vouchers', [VoucherController::class, 'index']);
    Route::get('/vouchers/{id}', [VoucherController::class, 'show']);
    Route::post('/vouchers', [VoucherController::class, 'add']);
    Route::delete('/vouchers/{id}', [VoucherController::class, 'delete']);
    Route::put('/vouchers/{id}', [VoucherController::class, 'update']);

    //Comment
    Route::get('/comments', [CommentController::class, 'index'])->name('api.admin.comments');
    Route::get('/comments/{id}', [CommentController::class, 'show']);
    Route::delete('/comments/{id}', [CommentController::class, 'delete']);
    Route::get('/report-comments', [CommentController::class, 'ReportedComments'])->name('api.admin.report-comments');



    //Post
    Route::get('/post', [PostController::class, 'index']);
    Route::post('/post', [PostController::class, 'create_']);


    //DepositHistories
    Route::get('/deposithistories', [DepositHistoriesController::class, 'index']);
    Route::put('/tickstatus/{id}', [DepositHistoriesController::class, 'tickstatus']);

    //wallets
    Route::get('/wallet/{id}', [WalletController::class, 'wallet']);
    Route::put('/wallet/{id}/{dong}', [WalletController::class, 'addmoney']);


});


Route::group(['prefix' => 'web',], function () {

    //wallets
    Route::get('/wallets/{id}', [WalletsController::class, 'index']);
    Route::post('/requestbill', [WalletsController::class, 'requestbill']);

});
