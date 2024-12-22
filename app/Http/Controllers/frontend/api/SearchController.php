<?php

namespace App\Http\Controllers\frontend\api;

use App\Http\Controllers\Controller;
use App\Models\Workout_Package;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchWorkoutPackages(Request $request)
    {
        $query = Workout_Package::query();

        // Lọc theo "level" từ q2
        if ($request->has('q_2')) {
            $level = $request->input('q_2'); // Giá trị q_2: "Người Mới Bắt Đầu", "Trung Cấp", "Nâng Cao"
            $query->where('level', $level);
        }

        // Lọc theo "special_level" từ q4
        if ($request->has('q_4')) {
            $specialLevels = $request->input('q_4');
            if (is_array($specialLevels) || is_countable($specialLevels)) {
                $query->whereIn('special_level', $specialLevels);
            } else {
                $query->where('special_level', $specialLevels);
            }
        }

        // Lọc theo "duration_days" từ q_5
        if ($request->has('q_5')) {
            $q5 = intval($request->input('q_5'));

            if ($q5 == 31) {
                $query->where('duration_days', '<', 31); // < 1 tháng
            } elseif ($q5 == 93) {
                $query->whereBetween('duration_days', [31, 93]); // 1 ~ 3 tháng
            } elseif ($q5 == 186) {
                $query->whereBetween('duration_days', [94, 186]); // ~ 6 tháng
            } elseif ($q5 == 365) {
                $query->whereBetween('duration_days', [187, 365]); // ~ 1 năm
            }
        }

        $workoutPackages = $query->orderBy('id', 'asc')->get();

        return response()->json($workoutPackages);
    }
}
