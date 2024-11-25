<?php

namespace App\Http\Controllers\frontend\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_videos;


class UserVideoController extends Controller
{
    public function store(Request $request){
        $data = new user_videos();
        $data->user_id = $request->input('user_id');
        $data->description = $request->input('description');
        $data->workout_package_id = $request->input('workout_package_id');
        $data->day_number = $request->input('day_number'); 
        $data->video_path = $request->input('video_path');
        if($request->hasFile('video_path')){
            $file = $request->file('video_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/user_video', $filename);
            $data->video_path = $filename;
        }

        $data->save();

        return response()->json($data);
    }
    public function getVideo($workout_id, $user_id, $day_number)
    {
    $userVideo = user_videos::where('user_id', $user_id)
                            ->where('workout_package_id', $workout_id)
                            ->where('day_number', $day_number)
                            ->first();
    if ($userVideo) {
        return response()->json([
            'video_id'=> $userVideo->id,
            'created_at'=> $userVideo->created_at,
            'status' => $userVideo->status,
            'status_main' => 'success',
            'feedback' => $userVideo->feedback,
            'video_url' => asset('uploads/user_video/' . $userVideo->video_path),
        ]);
    } else {
        return response()->json([
            'status_main' => 'error',
            'message' => 'Video not found for this day.'
        ]);
    }
}

}
