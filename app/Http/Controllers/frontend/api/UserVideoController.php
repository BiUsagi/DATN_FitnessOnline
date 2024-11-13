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
}
