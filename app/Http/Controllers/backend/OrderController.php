<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        $data = Order::all();
        return view('backend/order/orders', compact('data'));
    }

    public function info_order($id)
    {
        $data = Order::find($id);
        return view('backend/order/info_order', compact('data'));
    }

    public function user()
    {
        return view('backend/order/customer');
    }

    public function customer_manage()
    {   
        $list_customer = Order::with(['user','workoutPackage'])->get();
        return view('backend/order/customer_manage',['list_customer' => $list_customer]);
    }

    public function customer_days()
    {
        return view('backend/order/customer_days');
    }
}