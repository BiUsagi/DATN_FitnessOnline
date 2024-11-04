<?php

namespace App\Http\Controllers\frontend\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;


class NotificationController extends Controller
{
    public function add(Request $request) {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
            'type' => 'required|integer',
            'link' => 'nullable|string',
        ]);
    
        // Tạo thông báo
        $notification = Notification::create([
            'user_id' => $request->user_id,
            'message' => $request->message,
            'type' => $request->type,
            'link' => $request->link ?? '',
        ]);
    
        return response()->json([
            'success' => true,
            'data' => $notification
        ]);
    }

    public function index($id){
        
    }
    
}
