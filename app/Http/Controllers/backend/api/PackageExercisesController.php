<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Package_Exercise;
use App\Models\Workout_Package;
use App\Models\Exercise;
use Illuminate\Http\Request;


class PackageExercisesController extends Controller
{
    public function getAllExercisesForPackage()
    {
        $allExercises = Exercise::all();

        return response()->json($allExercises);
    }
    public function saveExercises(Request $request, $id, $day)
    {
        $ptId = $request->input('pt_id'); 

        Package_Exercise::where('workout_package_id', $id)
            ->where('day_number', $day)
            ->delete();

        $exercises = $request->input('exercises');

        // Kiểm tra xem exercises có tồn tại và là một mảng
        if (is_array($exercises)) {
            foreach ($exercises as $index => $exercise) {
                Package_Exercise::create([
                    'workout_package_id' => $id,
                    'exercise_id' => $exercise['id'],
                    'day_number' => $day,
                    'sequence' => $index + 1,
                    'is_day_off' => false,
                    'pt_id' => $ptId,
                ]);
            }
        }

        return response()->json(['message' => 'Lưu thành công các bài tập vào ngày ' . $day]);
    }



}
