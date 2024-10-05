<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;

class AccountsController extends Controller
{
    public function staff_account()
    {
        $data = Staff::all();
        return view('backend/accounts/staff_accounts', compact('data'));
    }
    public function customer_account()
    {
        $data = User::all();
        return view('backend/accounts/customer_accounts', compact('data'));
    }

    public function customer_info($id)
    {
        $data = User::where('id', $id)->first();
        return view('backend/accounts/info_customer', compact('data'));
    }

}