<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Workout_package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
use App\Models\User;



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
        $user = Auth::user();
        $pt_id = Staff::where('user_id',Auth::user()->id)->first();
        $id = $pt_id->id;

        $list_customer = Order::with(['user','workoutPackage'])
        ->whereHas('workoutPackage', function($query) use ($id) {
            $query->where('staff_id',$id);
        })->get();

        return view('backend/order/customer_manage',['list_customer' => $list_customer]);
    }

    public function customer_days($id, $user_id)
    {
        $avatar_user = User::find($user_id);
        $days = Workout_package::find($id);
        $info = Order::where('user_id',$user_id)
                     ->where('workout_package_id',$id)->first();
        return view('backend/order/customer_days',['days'=>$days, 'info'=>$info, 'avatar'=>$avatar_user]);
    }
}