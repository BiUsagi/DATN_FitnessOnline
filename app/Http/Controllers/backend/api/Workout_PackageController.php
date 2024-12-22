<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Workout_Package;
use App\Models\Exercise;
use App\Models\Package_Exercise;
use App\Models\user_package_progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\backend\PackageRequest;





class Workout_PackageController extends Controller
{
    public function get_exercises()
    {
        $data = Exercise::orderBy('id', 'asc')->select('id', 'name')->get();
        return response()->json($data);
    }

    public function workout_detail($id)
    {
        $details = Workout_Package::find($id);

        return response()->json($details);
    }

    public function create_(PackageRequest $request)
    {
        $set = new Workout_package;
        $set->package_name = $request->input('package_name');
        $set->price = $request->input('price');
        $set->description = $request->input('description');
        $set->staff_id = $request->input('staff_id');
        $set->level = $request->input('level');
        $set->special_level = $request->input('special_level');
        $set->status = $request->input('status');
        $set->duration_days = $request->input('duration_days');
        $set->status = $request->input('status');


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/gym_package', $filename);
            $set->image = $filename;
        }
    

        $set->save();
        return response()->json($set);

    }

    public function update_($id, Request $request)
    {
        $set = Workout_package::find($id);
        $set->package_name = $request->input('package_name');
        $set->price = $request->input('price');
        $set->description = $request->input('description');
        $set->staff_id = $request->input('staff_id');
        $set->level = $request->input('level');
        $set->special_level = $request->input('special_level');
        $set->status = $request->input('status');
        $set->duration_days = $request->input('duration_days');
        $set->status = $request->input('status');


        if ($request->hasFile('image')) {

            $old_image = 'uploads/gym_package'.$set->image;
            if(file::exists($old_image)){
                file::delete($old_image);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/gym_package', $filename);
            $set->image = $filename;
        }

        $set->save();
        return response()->json($set);
    }

    public function delete(Request $request, $id)
    {
        $set = Workout_Package::find($id);
        $set->delete();
        return response()->json($set);
    }

    public function getExercisesForDay($packageId, $dayNumber)
    {
        $exercises = Package_Exercise::where('workout_package_id', $packageId)
            ->where('day_number', $dayNumber)
            ->get();
        $result = $exercises->map(function ($item) {
            return [
                'id' => $item->exercise_id,
                'name' => $item->exercise->name,
                'sequence' => $item->sequence,
            ];
        });
        return response()->json($exercises);
    }

    public function getDaysWithExerciseCount($id)
    {
        $package = Workout_package::with('exercises')->find($id);

        $days = [];

        for ($i = 1; $i <= $package->duration_days; $i++) {
            $count = $package->exercises()->where('day', $i)->count();
            $days[] = [
                'day' => $i,
                'exercise_count' => $count,
            ];
        }

        return response()->json($days);
    }
    public function saveProgress(Request $request)
    {
        $packageId = $request->input('package_id');
        $currentDay = $request->input('current_day');
        $currentExerciseId = $request->input('current_exercise_id');
        $user_id = $request->input('user_id');

        // Update the current day's progress as completed
        user_package_progress::updateOrCreate(
            [
                'user_id' => $user_id,
                'workout_package_id' => $packageId,
                'current_day' => $currentDay,
                
            ],
            [
                'current_exercise_id' => $currentExerciseId,
                'is_completed' => true,
            ]
        );

        // Unlock the next day
        $nextDay = $currentDay + 1;
        user_package_progress::updateOrCreate(
            [
                'user_id' => $user_id,
                'workout_package_id' => $packageId,
                'current_day' => $nextDay,
            ],
            [
                'current_exercise_id' => $currentExerciseId, 
                'is_completed' => true,
            ]
        );

        return response()->json(['status' => 'success']);
    }



}