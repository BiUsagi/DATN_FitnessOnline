<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Requests\backend\ExerciseRequest;


class ExerciseController extends Controller
{
    public function index(){
        $data = Exercise::orderBy('id', 'asc')->get();
        return response()->json($data) ;
    }
    
    public function show($id){
        $exercise = Exercise::findOrFail($id);
        
        return response()->json([
            'id' => $exercise->id,
            'name' => $exercise->name,
            'description' => $exercise->description,
            'sets' => $exercise->sets,
            'reps' => $exercise->reps,
            'video_1' => $exercise->video_url,
            'video_2' => $exercise->video_url_second
        ]);
    }

    public function add(ExerciseRequest $request){
        $exercise = new Exercise();
        $exercise->name = $request->input('name');
        $exercise->sets = $request->input('sets');
        $exercise->reps = $request->input('reps');
        $exercise->description = $request->input('description');
        $exercise->pt_id = $request->input('pt_id');
        $exercise->status = $request->input('exercise-status');
        if($request->hasFile('video_url')){
            $file = $request->file('video_url');
            $filename = time().'_first.'.$file->getClientOriginalExtension();
            $file->move('uploads/video_exercise', $filename);
            $exercise->video_url = $filename;
        }
        if($request->hasFile('video_url2')){
            $file2 = $request->file('video_url2');
            $filename2 = time().'_second.'.$file2->getClientOriginalExtension();
            $file2->move('uploads/video_exercise', $filename2);
            $exercise->video_url_second = $filename2;
        }

        $exercise->save();

        return response()->json($exercise);
    }

    public function update(Request $request, $id){
        $exercise = Exercise::find($id);
        $exercise->name = $request->input('exercise_name');
        $exercise->sets = $request->input('sets');
        $exercise->reps = $request->input('reps');
        $exercise->description = $request->input('description');
        $exercise->status = $request->input('exercise-status');
        
        if($request->hasFile('video_url')){
            $file = $request->file('video_url');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/video_exercise', $filename);
            $exercise->video_url = $filename;
        }
        if($request->hasFile('video_url2')){
            $file = $request->file('video_url2');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/video_exercise', $filename);
            $exercise->video_url_second = $filename;
        }
        

        $exercise->save();

        return response()->json($exercise);
    }

    public function delete(Request $request, $id) 
    {   
        $ex = Exercise::find($id);
        $ex->delete();

        return response()->json($ex);
    }
}