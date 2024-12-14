<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\User;
use App\Models\Workout_Package;
use App\Models\Deposit_histories;
use App\Models\Notification;

use Auth;
use Carbon\Carbon;


class WalletController extends Controller
{
    public function index()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $today = Carbon::today();

        $userId = Auth::user()->id;
        $wallet = Wallet::where('user_id', $userId)->first();
        $userOrders = Order::whereHas('workoutPackage.staff.user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->get();

        $totalPurchasePrice = Order::whereHas('workoutPackage.staff.user', function ($query) {
            $query->where('id', Auth::id());
        })
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('purchase_price');

        // $totalWorkoutPackages = Workout_Package::count();
        $totalWorkoutPackages = Workout_Package::whereHas('staff.user', function ($query) {
            $query->where('id', Auth::id());
        })->count();

        $Deposit_histories = Deposit_histories::where('user_id', $userId)->get();

        $notifications = Notification::where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->where('type', 1)
            ->get();


        return view('backend/walletpt/index', [
            'tongdt' => $totalPurchasePrice,
            'sodu' => $wallet->balance,
            'tonggt' => $totalWorkoutPackages,
            'Deposit_histories' => $Deposit_histories,
            'notifications' => $notifications
        ]);

        //goi tap, doanh thu thang nay, lich su rut tien, thong bao
    }

    public function ruttienpt()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $wallet = Wallet::where('user_id', $userId)->first();

        return view('backend/walletpt/ruttien', [
            'sodu' => $wallet->balance,
            'user_name' => $user->user_name,
            'user_id' => $userId,
            'wallet' => $wallet->id
        ]);
    }


}
