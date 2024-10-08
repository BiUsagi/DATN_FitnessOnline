<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slides;
use Illuminate\Http\Request;

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
    function create_( Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], 
        [
            'title.required' => 'Mô tả không được để trống.',
        ]);
        $t = new Slides;
        $t->title = $request->title;
        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'assets/backend/img/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path($path), $fileName); // Di chuyển file vào thư mục public/backend/img/
            $t->image = $path . $fileName; // Lưu đường dẫn vào cơ sở dữ liệu
        }
        // Lưu thông tin vào cơ sở dữ liệu
        $t->save(); 
        toastr()->success('Thêm bài tập thành công!');   
        return redirect()->route('admin.slides');
    }
    //xóa
    function xoa($id){
        $t= Slides::find($id);
        $t -> delete();
        return redirect()->route('admin.slides');
    }
}
