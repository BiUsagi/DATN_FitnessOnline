<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slides;
use Illuminate\Http\Request;
use App\Http\Requests\backend\SlidesRequest;
class SlidesController extends Controller
{
    public function index()
    {
        $slides = Slides::all(); // Lấy tất cả dữ liệu từ bảng tin
        return view('backend/slides/index',compact('slides'));
    }
    public function create(){
        return view('backend/slides/create');
    }


    //THÊM SLIDES
    public function create_(SlidesRequest $request) // Sử dụng SlidesRequest
    {
        $t = new Slides();
        $t->name = $request->name;
        $t->description = $request->description;
    
    // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $t->image = Slides::uploadImage($request->file('image')); // Gọi hàm upload
        }

        // Lưu thông tin vào cơ sở dữ liệu
        $t->save();   
        return redirect()->route('admin.slides');
    }

    //xóa
    function xoa($id){
        $t= Slides::find($id);
        $t -> delete();
        // toastr()->success('Xóa thành công!');   
        return redirect()->route('admin.slides');
    }


    // UPDATE SLISE
    function update($id){
        $slide= Slides::find($id);
        return view('backend/slides/update', ['slide'=>$slide]);   
    }


    public function update_(SlidesRequest $request, $id) // Sử dụng SlidesRequest
    {
        $t = Slides::find($id);
        $t->name = $request->name;
        $t->description = $request->description;

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $t->image = Slides::uploadImage($request->file('image')); // Gọi hàm upload
        }

        // Lưu thông tin vào cơ sở dữ liệu
        $t->save();  
        return redirect()->route('admin.slides');
    }

}
