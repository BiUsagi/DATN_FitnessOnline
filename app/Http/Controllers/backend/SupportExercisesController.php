<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support_Exercise;

class SupportExercisesController extends Controller
{
    public function index()
    {
        $supportExercises = Support_Exercise::with(['exercise', 'user', 'staff', 'replies.user', 'replies.staff'])
            ->whereNull('rep')
            ->select('id', 'content', 'exercise_id', 'user_id', 'staff_id', 'created_at')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'content' => $item->content,
                    'exercise_name' => $item->exercise->exercise_name ?? 'N/A',
                    'user_name' => $item->user->user_name ?? 'N/A',
                    'staff_name' => $item->staff->staff_name ?? 'N/A',
                    'created_at' => $item->created_at,
                    'replies' => $item->replies->map(function ($reply) {
                        return [
                            'id' => $reply->id,
                            'content' => $reply->content,
                            'user_name' => $reply->user->user_name ?? 'N/A', // Tên người dùng của phản hồi
                            'staff_name' => $reply->staff->staff_name ?? 'N/A', // Tên nhân viên của phản hồi
                            'exercise_name' => $reply->exercise->exercise_name ?? 'N/A', // Tên nhân viên của phản hồi
                            'created_at' => $reply->created_at,
                        ];
                    }),
                ];
            });

        // dd($supportExercises);
        return view('backend.supportExercises.index', compact('supportExercises'));
    }


}