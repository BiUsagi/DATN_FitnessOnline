<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support_Exercise;

class SupportExercisesController extends Controller
{
    public function index()
    {
        $supportExercises = Support_Exercise::with(['exercise', 'user'])
            ->select('id', 'content', 'id_exercise', 'id_user', 'created_at')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'content' => $item->content,
                    'name_exercise' => $item->exercise->name_exercise ?? 'N/A',
                    'name_user' => $item->user->name ?? 'N/A',
                    'created_at' => $item->created_at,
                ];
            });

        // dd($supportExercises);
        return view('backend.supportExercises.index', compact('supportExercises'));
    }


}