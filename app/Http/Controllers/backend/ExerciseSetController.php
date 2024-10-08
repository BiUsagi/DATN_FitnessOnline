<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GymPackage;

class ExerciseSetController extends Controller
{
    public function index()
    {
        return view('backend/ExerciseSet/index');
    }

    public function create()
    {
        return view('backend/ExerciseSet/create');
    }

    public function create_(Request $request)
    {
        $set = new GymPackage;
        $set->name_package = $_POST['tengoitap'];
        $set->price = $_POST['giatien'];
        $set->description = $_POST['mota'];
        $set->tool = $_POST['dungcu'];
        $set->staff_id = $_POST['pt'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //lay ten mo rong png, jpg, ..
            $filename = time().'.'.$extension;
            $file->move('uploads/gym_package', $filename);
            $set->image = $filename;
        }

        $set->save();
        return view('backend/ExerciseSet/index');
    }

    public function update($id)
    {
        return view('backend/ExerciseSet/update');
    }
}