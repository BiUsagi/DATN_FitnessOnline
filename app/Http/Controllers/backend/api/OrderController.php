<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\user_videos;
use App\Models\video_feedback;




class OrderController extends Controller
{
    public function sendFeedback(Request $request, $id)
    {
        
        $feedback = user_videos::find($id);
        $feedback->feedback = $request->input('feedback');
        $feedback->status = $request->input('status');

        $feedback->save();

        return response()->json(['status' => 'success', 'message' => 'Feedback đã được gửi thành công.']);


    }
}