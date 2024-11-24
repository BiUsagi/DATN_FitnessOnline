<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Workout_Package;
use Auth;
use Carbon\Carbon;

class WalletController extends Controller
{
    public function index()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

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

        $totalWorkoutPackages = Workout_Package::count();


        return view('backend/walletpt/index', [
            'tongdt' => $totalPurchasePrice,
            'sodu' => $wallet->balance,
            'tonggt' => $totalWorkoutPackages
        ]);

        //goi tap, doanh thu thang nay, lich su rut tien, thong bao
    }

    public function ruttienpt(){
        return view('backend/walletpt/ruttien');
    }

}
