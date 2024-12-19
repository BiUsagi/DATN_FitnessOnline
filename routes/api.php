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
use App\Http\Controllers\backend\api\OrderController;
use App\Http\Controllers\backend\api\StatisticalController;
use App\Models\User;

//frontend
use App\Http\Controllers\frontend\api\WalletsController;
use App\Http\Controllers\frontend\api\NotificationController;
use App\Http\Controllers\frontend\api\PayController;
use App\Http\Controllers\frontend\api\SearchController;
use App\Http\Controllers\frontend\api\UserVideoController;
use App\Http\Controllers\frontend\ProfileController;
use App\Http\Controllers\frontend\api\TrainerRequestController;
use App\Http\Controllers\frontend\HomeController;
use App\Models\Workout_Package;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//User Upload
Route::post('/video_user', [UserVideoController::class, 'store']);
Route::get('/get-video/{workout_id}/{user_id}/{day_number}', [UserVideoController::class, 'getVideo'])->name('get_video');

// search
Route::post('/workout-packages/search', [SearchController::class, 'searchWorkoutPackages']);

Route::group(['prefix' => 'admin',], function () {
    //API of exercises
    Route::get('/exercises', [ExerciseController::class, 'index']);
    Route::get('/exercises/{id}', [ExerciseController::class, 'show'])->name('admin.exercises-show');
    Route::post('/exercises', [ExerciseController::class, 'add']);
    // Route::get('/exercises/{id}', [ExerciseController::class, 'add']);
    Route::post('/exercises/{id}', [ExerciseController::class, 'update']);
    Route::delete('/exercises/{id}', [ExerciseController::class, 'delete']);

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
    // Route lấy tiến độ của người dùng

    Route::post('/workout_hub/{id}/save-progress', [Workout_PackageController::class, 'saveProgress']);
    Route::post('/confirm-completion', [OrderController::class, 'confirmCompletion']);


    // account
    Route::get('/user/{id}', [AccountsController::class, 'showU'])->name('api.user.show');
    Route::put('/user/{id}', [AccountsController::class, 'updateU'])->name('api.user.update');
    Route::get('/staff/{id}', [AccountsController::class, 'showS'])->name('api.staff.show');
    Route::put('/staff/{id}', [AccountsController::class, 'updateS'])->name('api.staff.update');
    Route::post('/application/{id}/approve', [AccountsController::class, 'approve'])->name('api.staffrequests.approve');
    Route::post('/application/{id}/reject', [AccountsController::class, 'reject'])->name('api.staffrequests.reject');
    Route::post('/check-email', [AccountsController::class, 'checkEmail'])->name('api.check.email');
    Route::get('/check-email', [AccountsController::class, 'staffCheckEmail'])->name('api.staff.checkEmail');

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
    Route::get('/comments/reports/{id}', [CommentController::class, 'showCommentreport']);




    //Post
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/post/{id}', [PostController::class, 'show']);
    Route::post('/post', [PostController::class, 'create_']);
    Route::post('/post/{id}', [PostController::class, 'update_']);
    Route::delete('/post/{id}', [PostController::class, 'delete']);


    //DepositHistories
    Route::get('/deposithistories', [DepositHistoriesController::class, 'index']);
    Route::get('/deposithistories/list', [DepositHistoriesController::class, 'list']);
    Route::put('/tickstatus/{id}/{i}', [DepositHistoriesController::class, 'tickstatus']);

    //wallets
    Route::get('/wallet/{id}', [WalletController::class, 'wallet']);
    Route::put('/wallet/{id}/{dong}', [WalletController::class, 'addmoney']);

    //feedback
    Route::post('/feedback/{id}', [OrderController::class, 'sendFeedback']);

    //Statistical;
    Route::get('/revenue', [StatisticalController::class, 'revenue']);



});


Route::group(['prefix' => 'web',], function () {

    //wallets
    Route::get('/wallets/{id}', [WalletsController::class, 'index']);
    Route::get('/walletsbyuser/{id}', [WalletController::class, 'walletbyuser']);
    Route::post('/requestbill', [WalletsController::class, 'requestbill']);

    //Notification
    Route::post('/add-notification', [NotificationController::class, 'add']);
    Route::get('/get-notification/{id}', [NotificationController::class, 'get']);
    Route::get('/is_read/{id}', [NotificationController::class, 'put_read']);
    Route::get('/count_read/{id}', [NotificationController::class, 'get_read']);

    //pay
    Route::get('/getvoucher', [PayController::class, 'getVoucher']);
    Route::get('/getvouchercode', [PayController::class, 'getVoucherCode']);
    Route::post('/pay', [PayController::class, 'pay']);
    Route::get('/checkorder', [PayController::class, 'checkorder']);

    // application
    Route::post('/submit-application/{id}', [TrainerRequestController::class, 'store'])->name('submit.application');


});
