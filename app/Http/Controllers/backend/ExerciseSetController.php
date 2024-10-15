<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GymPackage;
use Illuminate\Support\Facades\File;

class ExerciseSetController extends Controller
{
    public function index()
    {
        $all_package = GymPackage::orderBy('id','desc')->get();
        return view('backend/ExerciseSet/index', ['all_package' => $all_package]);
    }

    public function create()
    {
        return view('backend/ExerciseSet/create');
    }

    public function create_(Request $request)
    {
        $set = new GymPackage;
        $set->name_package = $request->input('tengoitap');
        $set->price = $request->input('giatien');
        $set->description = $request->input('mota');
        $set->tool = $request->input('dungcu');
        $set->staff_id = $request->input('pt');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //lay ten mo rong png, jpg, ..
            $filename = time().'.'.$extension;
            $file->move('uploads/gym_package', $filename);
            $set->image = $filename;
        }

        $set->save();
        toastr()->success('Thêm bài tập thành công!');
        return redirect()->back();
    }

    public function update($id)
    {   
        $update_id = GymPackage::find($id);
        return view('backend/ExerciseSet/update', ['update_id' => $update_id]);
    }

    public function update_($id, Request $request)
    {
        $set = GymPackage::find($id);
        $set->name_package = $request->input('tengoitap');
        $set->price = $request->input('giatien');
        $set->description = $request->input('mota');
        $set->tool = $request->input('dungcu');
        $set->staff_id = $request->input('pt');

        if($request->hasFile('image')){
            //neu co file cu thi tim va xoa 
            $anhcu = 'uploads/gym_package/'.$set->image;

            if(File::exists($anhcu)){
                File::delete($anhcu);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //lay ten mo rong png, jpg, ..
            $filename = time().'.'.$extension;
            $file->move('uploads/gym_package', $filename);
            $set->image = $filename;
        }

        $set->update();
        toastr()->success('Cập nhật bài tập thành công!');
        return redirect()->back();
    }

    public function delete($id)
    {
        $set = GymPackage::find($id);
        $set->delete();

        toastr()->success('Xóa bài tập thành công!');
        return redirect()->back();
    }
}