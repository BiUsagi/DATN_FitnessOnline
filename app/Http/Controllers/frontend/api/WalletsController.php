<?php

namespace App\Http\Controllers\frontend\api;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletsController extends Controller
{
    public function index($id)
    {
        $data = Wallet::where('user_id', $id)->first();
        return response()->json($data);
    }
}
