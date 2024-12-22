<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Support_Exercise;
use Illuminate\Http\Request;

class SupportExercisesController extends Controller
{
    public function index()
    {
        $supportExercises = Support_Exercise::with(['exercise', 'user', 'staff', 'replies.user', 'replies.staff'])
            ->whereNull('rep')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'content' => $item->content,
                    'exercise_name' => $item->exercise->name ?? 'N/A',
                    'user_name' => $item->user->user_name ?? 'N/A',
                    'user_avatar' => $item->user->avatar ?? 'N/A',
                    'staff_name' => $item->staff->staff_name ?? 'N/A',
                    'created_at' => $item->created_at,
                    'replies' => $item->replies->map(function ($reply) {
                        return [
                            'id' => $reply->id,
                            'content' => $reply->content,
                            'user_name' => $reply->user->user_name ?? 'N/A', // Tên người dùng của phản hồi
                            'user_avata' => $reply->user->avatar ?? 'N/A',
                            'staff_name' => $reply->staff->staff_name ?? 'N/A', // Tên nhân viên của phản hồi
                            'exercise_name' => $reply->exercise->name ?? 'N/A', // Tên nhân viên của phản hồi
                            'created_at' => $reply->created_at,
                        ];
                    }),
                ];
            });


        return response()->json($supportExercises);
    }

    public function show($id)
    {
        $supportExercise = Support_Exercise::with(['exercise', 'user', 'staff', 'replies.user', 'replies.staff'])
            ->where('id', $id) 
            ->first(); 

        if ($supportExercise) {
            $result = [
                'id' => $supportExercise->id,
                'content' => $supportExercise->content,
                'exercise_name' => $supportExercise->exercise->exercise_name ?? 'N/A',
                'user_name' => $supportExercise->user->user_name ?? 'N/A',
                'user_avatar' => $supportExercise->user->avatar ?? 'N/A',
                'staff_name' => $supportExercise->staff->staff_name ?? 'N/A',
                'created_at' => $supportExercise->created_at,
                'replies' => $supportExercise->replies->map(function ($reply) {
                    return [
                        'id' => $reply->id,
                        'content' => $reply->content,
                        'user_name' => $reply->user->user_name ?? 'N/A', // Tên người dùng của phản hồi
                        'user_id' => $reply->user->id ?? 'N/A', 
                        'user_avatar' => $reply->user->avatar ?? 'N/A',
                        'staff_name' => $reply->staff->staff_name ?? 'N/A', // Tên nhân viên của phản hồi
                        'staff_avatar' => $reply->staff->avatar ?? 'N/A',
                        'staff_userid' => $reply->staff->user_id ?? 'N/A', 
                        'created_at' => $reply->created_at,
                    ];
                }),
            ];

            return response()->json($result);
        } else {
            return response()->json(['message' => 'Not Found'], 404);
        }

    }
}
