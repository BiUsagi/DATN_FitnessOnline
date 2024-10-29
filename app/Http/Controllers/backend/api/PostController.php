<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $data = Posts::orderBy('id', 'asc')->get();
        return response()->json($data) ;
    }

    public function create_(Request $request){
        $post = new Posts();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->description = $request->input('description');

       
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //lay ten mo rong png, jpg, ..
            $filename = time().'.'.$extension;
            $file->move('uploads/post_image', $filename);
            $post->image = $filename;
        }

        $post->save();

        return response()->json($post);
    }
}