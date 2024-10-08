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
    function create_( Request $request){
        $request->validate([
            'name_user' => 'required|max:100|regex:/^[\pL\s]+$/u',
            'title' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => [
                'required',
                'digits_between:10,11',
                'regex:/^(\+84|0)(3|5|7|8|9)[0-9]{8}$/',
            ],
        ], 
        [
            'name_user.required' => 'Tên không được để trống.',
            'name_user.max:255' => 'Tên không được quá 255 kí tự.',
            'name_user.regex' => 'Tên không được ghi số.',
            'title.required' => 'Mô tả không được để trống.',
            'email.required' => 'Email không được để trống.',
            
        ]);
        $t = new Slides;
        $t->name_user = $request->name_user;
        $t->title = $request->title;
        $t->email = $request->email;
        $t->address = $request->address;
        $t->phone_number = $request->phone_number;
    
        // Xử lý upload ảnh
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $path = '';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path($path), $fileName); // Di chuyển file vào thư mục public/backend/img/
            $t->avatar = $path . $fileName; // Lưu đường dẫn vào cơ sở dữ liệu
        }
    
        // Lưu thông tin vào cơ sở dữ liệu
        $t->save(); 
        toastr()->success('Thêm bài tập thành công!');   
        return view('backend/slides/create');
    }

}
