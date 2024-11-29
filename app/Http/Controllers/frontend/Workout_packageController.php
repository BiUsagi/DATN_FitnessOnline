<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Workout_Package;
use App\Models\Order;
use App\Models\user_videos;
use App\Models\user_package_progress;
use Illuminate\Http\Request;

class Workout_packageController extends Controller
{
    public function workout_detail($id)
    {
        $package = Workout_Package::with('staff')->find($id);
        if (!$package) {
            return redirect()->back()->with('error', 'Không tìm thấy gói tập này!');
        }
        return view('frontend/workout_package/workout_detail', compact('package'));
    }

    public function workout_bought($user_id)
    {
        $workouts = Order::where('user_id', $user_id)
            ->with('workoutPackage.staff')
            ->get();

        foreach ($workouts as $workout) {
            $progress = $this->getProgress($user_id, $workout->workoutPackage->id);
            $workout->progress = $progress;
        }

        return view('frontend/workout_package/workout_bought', compact('workouts'));
    }


    private function getProgress($userId, $workoutPackageId)
    {
        $workoutPackage = Workout_Package::find($workoutPackageId);

        $progress = user_package_progress::where('user_id', $userId)
            ->where('workout_package_id', $workoutPackageId)
            ->orderBy('current_day', 'desc')
            ->first();

        $totalDays = $workoutPackage->duration_days;

        if (!$progress) {
            return 0;
        }

        $currentDay = $progress->current_day;

        if ($totalDays > 0) {
            $percentComplete = (($currentDay - 1) / $totalDays) * 100;
        } else {
            $percentComplete = 0;
        }

        return round($percentComplete, 0);
    }

    public function workout_hub($id)
    {
        $package = Workout_Package::with('userPackageProgress')->find($id);

        if (!$package) {
            return redirect()->back()->with('error', 'Không tìm thấy gói tập này!');
        }

        $progress = $package->userPackageProgress()->where('user_id', auth()->id())->first();

        if (!$progress) {
            $progress = null;
        }

        $orders = Order::where('workout_package_id', $id)
            ->with('user')
            ->get();

        return view('frontend.workout_hub.index', compact('package', 'progress', 'orders'));
    }

    public function submit_exercise($workout_id, $user_id)
    {
        $userUpload = User_Videos::where('user_id', $user_id)
            ->where('workout_package_id', $workout_id)
            ->orderBy('day_number')
            ->get();

        $workoutPackage = Workout_Package::find($workout_id);

        $daysStatus = [];
        for ($day = 1; $day <= $workoutPackage->duration_days; $day++) {
            $video = $userUpload->firstWhere('day_number', $day);
            $daysStatus[$day] = $video ? $video->status : 0;
        }

        return view('frontend.submit_exercise.index', compact('userUpload', 'workoutPackage', 'daysStatus'));
    }


}
