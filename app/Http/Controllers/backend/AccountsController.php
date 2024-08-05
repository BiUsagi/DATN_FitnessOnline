<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;

class AccountsController extends Controller
{
    public function staffaccount()
    {
        $data = Staff::all();
        return view('backend/accounts/staffaccounts', compact('data'));
    }
}