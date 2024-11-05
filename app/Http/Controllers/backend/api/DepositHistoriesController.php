<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit_histories;


class DepositHistoriesController extends Controller
{
    public function index()
    {
        $data = Deposit_histories::with('user') // Lấy quan hệ user
            ->where('status', 0)
            ->get()
            ->map(function ($deposit) {
                return [
                    'id' => $deposit->id,
                    'wallet_id' => $deposit->wallet_id,
                    'amount' => $deposit->amount,
                    'deposited_at' => $deposit->deposited_at,
                    'transaction_id' => $deposit->transaction_id,
                    'description' => $deposit->description,
                    'status' => $deposit->status,
                    'user_name' => $deposit->user->user_name ?? null,
                    'user_id' => $deposit->user->id,
                ];
            });

        return response()->json($data);
    }

    public function list()
    {
        $data = Deposit_histories::with('user') // Lấy quan hệ user
            ->whereIn('status', [1, 2])
            ->orderBy('deposited_at', 'desc')
            ->get()
            ->map(function ($deposit) {
                return [
                    'id' => $deposit->id,
                    'wallet_id' => $deposit->wallet_id,
                    'amount' => $deposit->amount,
                    'deposited_at' => $deposit->deposited_at,
                    'transaction_id' => $deposit->transaction_id,
                    'description' => $deposit->description,
                    'status' => $deposit->status,
                    'user_name' => $deposit->user->user_name ?? null, // Lấy tên người dùng nếu có
                ];
            });

        return response()->json($data);
    }

    public function tickstatus($id, $i)
    {
        $data = Deposit_histories::where('id', $id)->first();
        if ($i == 1 || $i == 2) {
            $data->status = $i;
        } else {
            $data->status = 0;
        }

        $data->save();
    }

}
