<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;



class ExerciseController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pt_id = Staff::where('user_id',Auth::user()->id)->first();

        if($user->role_012 === 2) {
            $data = Exercise::orderBy('id', 'asc')->get();
        }else {
            $data = Exercise::where('pt_id',$pt_id->id)->get();
        }   

        return view('backend/Exercise/index',['data'=>$data]);
    }

    public function createExercise()
    {
        $pt_id = Staff::where('user_id',Auth::user()->id)->first();
        return view('backend/Exercise/create', ['pt_id'=>$pt_id]);
    }

    public function updateExercise($id)
    {
        $pt_id = Staff::where('user_id',Auth::user()->id)->first();

        $ex = Exercise::find($id);

        return view('backend/Exercise/update', ['ex' => $ex, 'pt_id'=>$pt_id]);
    }
}