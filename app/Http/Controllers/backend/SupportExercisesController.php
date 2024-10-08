<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support_Exercise;

class SupportExercisesController extends Controller
{
    public function index()
    {
        $supportExercises = Support_Exercise::with(['exercise', 'user', 'staff'])
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
                ];
            });

        // dd($supportExercises);
        return view('backend.supportExercises.index', compact('supportExercises'));
    }


}