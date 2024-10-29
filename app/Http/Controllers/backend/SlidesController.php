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
    //thêm
    // function create_( Request $request){
    //     $request->validate([
    //         'name' => 'required|regex:/^[^\d].*$/',
    //         'description' => 'required|regex:/^[^\d].*$/',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ], 
    //     [
    //         'name.required' => 'Mô tả không được để trống.',
    //         'name.regex' => 'Mô tả không được viết số đầu tiên.',
    //         'description.required' => 'Mô tả không được để trống.',
    //         'description.regex' => 'Mô tả không được viết số đầu tiên.',
    //     ]);
    //     $t = new Slides;
    //     $t->name = $request->name;
    //     $t->description = $request->description;
    //     // Xử lý upload ảnh
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $path = 'assets/backend/img/';
    //         $fileName = time() . '-' . $file->getClientOriginalName();
    //         $file->move(public_path($path), $fileName); // Di chuyển file vào thư mục public/backend/img/
    //         $t->image = $fileName; // Lưu đường dẫn vào cơ sở dữ liệu
    //     }
    //     // Lưu thông tin vào cơ sở dữ liệu
    //     $t->save(); 
    //     toastr()->success('Thêm giao diện thành công!');   
    //     return redirect()->route('admin.slides');
    // }
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
        toastr()->success('Thêm giao diện thành công!');   
        return redirect()->route('admin.slides');
    }

    //xóa
    function xoa($id){
        $t= Slides::find($id);
        $t -> delete();
        // toastr()->success('Xóa thành công!');   
        return redirect()->route('admin.slides');
    }
    function update($id){
        $slide= Slides::find($id);
        return view('backend/slides/update', ['slide'=>$slide]);   
    }
    // function update_(Request $request, $id){
    //     $request->validate([
    //         'name' => 'required|regex:/^[^\d].*$/',
    //         'description' => 'required|regex:/^[^\d].*$/',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ], 
    //     [
    //         'name.required' => 'Tên không được để trống.',
    //         'name.regex' => 'Mô tả không được viết số đầu tiên.',
    //         'description.required' => 'Mô tả không được để trống.',
    //         'description.regex' => 'Mô tả không được viết số đầu tiên.',
    //     ]);
    //     $t= Slides::find($id);
    //     $t->name = $request->name;
    //     $t->description = $request->description;
    //     // Xử lý upload ảnh
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $path = 'assets/backend/img/';
    //         $fileName = time() . '-' . $file->getClientOriginalName();
    //         $file->move(public_path($path), $fileName); // Di chuyển file vào thư mục public/backend/img/
    //         $t->image = $fileName; // Lưu đường dẫn vào cơ sở dữ liệu
    //     }
    //     // Lưu thông tin vào cơ sở dữ liệu
    //     $t->save(); 
    //     toastr()->success('Update giao diện thành công!');   
    //     return redirect()->route('admin.slides');
    // }
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
        toastr()->success('Cập nhật giao diện thành công!');   
        return redirect()->route('admin.slides');
    }

}
