<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\user_videos;
use App\Models\user_package_progress;
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
    public function confirmCompletion(Request $request)
        {
            $validatedData = $request->validate([
                'workout_package_id' => 'required|integer',
                'user_id' => 'required|integer',
                'current_day' => 'required|integer',
            ]);

            $workoutId = $validatedData['workout_package_id'];
            $userId = $validatedData['user_id'];
            $dayNumber = $validatedData['current_day'];

            $progress = user_package_progress::where('workout_package_id', $workoutId)
                ->where('user_id', $userId)
                ->where('current_day', $dayNumber)
                ->first();

            if (!$progress) {
                $progress = new user_package_progress();
                $progress->workout_package_id = $workoutId;
                $progress->user_id = $userId;
                $progress->current_day = $dayNumber;
            }

            $progress->is_completed = 1;
            $progress->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Ngày tập đã được xác nhận hoàn thành.'
            ]);
        }

}