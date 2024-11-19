<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Package_Exercise;
use App\Models\Workout_Package;
use App\Models\Exercise;
use App\Models\Staff; 
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

        // Kiểm tra sự tồn tại của pt_id trong bảng Staff (hoặc bảng phù hợp)
        if (!Staff::where('id', $ptId)->exists()) {
            return response()->json(['error' => 'PT không tồn tại'], 400);
        }

        // Xóa các bài tập hiện tại của ngày đã chọn trước khi thêm mới
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
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        } else {
            return response()->json(['error' => 'Dữ liệu bài tập không hợp lệ'], 400);
        }

        return response()->json(['message' => 'Lưu thành công các bài tập vào ngày ' . $day]);
    }



}
