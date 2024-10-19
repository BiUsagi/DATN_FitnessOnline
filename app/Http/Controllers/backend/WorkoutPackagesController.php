<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;    
use Illuminate\Http\Request;
use App\Models\Workout_Package;
use Illuminate\Support\Facades\File;


class WorkoutPackagesController extends Controller
{
    public function index(){
        $all = Workout_package::orderBy('id','desc')->get();
        return view('backend/workout_package/index', ['all' => $all]);
    }

    public function create(){
        return view('backend/workout_package/create');
    }

    public function create_(Request $request)
    {
        $set = new Workout_package;
        $set->package_name = $request->input('tengoitap');
        $set->price = $request->input('giatien');
        $set->description = $request->input('mota');
        $set->staff_id = $request->input('pt');
        $set->level = $request->input('capdo');
        $set->duration = $request->input('thoigian');

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
        $update_id = Workout_package::find($id);
        return view('backend/workout_package/update', ['update_id' => $update_id]);
    }

    public function update_($id, Request $request)  
    {
        $set = Workout_package::find($id);
        $set->package_name = $request->input('tengoitap');
        $set->price = $request->input('giatien');
        $set->description = $request->input('mota');
        $set->staff_id = $request->input('pt');
        $set->level = $request->input('capdo');
        $set->duration = $request->input('thoigian');

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
        return redirect('admin/exerciseset');
    }

    public function delete($id)
    {
        $set = Workout_package::find($id);
        $set->delete();

        toastr()->success('Xóa bài tập thành công!');
        return redirect()->back();
    }
}
