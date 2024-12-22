<?php

namespace App\Http\Controllers\Backend\api;

use App\Http\Controllers\Controller;
use App\Models\Workout_Package;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Workout_hubController extends Controller
{
    public function getDayExercises($id, $dayNumber): JsonResponse
    {
        $workoutPackage = Workout_Package::with(['exercises' => function ($query) use ($dayNumber) {
            $query->wherePivot('day_number', $dayNumber);
        }])->find($id);
    
        if (!$workoutPackage) {
            return response()->json([
                'message' => 'Workout package not found.'
            ], 404);
        }
    
        return response()->json($workoutPackage->exercises);
    }
    
    
}
