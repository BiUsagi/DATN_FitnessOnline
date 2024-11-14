<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\user_videos;
use App\Models\video_feedback;




class OrderController extends Controller
{
    public function sendFeedback(Request $request)
    {
        
        $feedback = new video_feedback();
        $feedback->video_id = $request->input('video_id');
        $feedback->feedback = $request->input('feedback');
        $feedback->pt_id = $request->input('pt_id');

        $feedback->save();

        $video = user_videos::find($request->input('video_id'));
        $video->status = 1; 
        $video->save();
 
        return response()->json(['status' => 'success', 'message' => 'Feedback đã được gửi thành công.']);


    }
}