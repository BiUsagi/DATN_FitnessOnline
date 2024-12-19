<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\backend\PostRequest;



class PostController extends Controller
{
    public function index(){
        $data = Posts::orderBy('id', 'asc')->get();
        return response()->json($data) ;
    }

    public function show($id){
        $post = Posts::findOrFail($id);
        return response()->json($post);
    }

    public function create_(PostRequest $request){
        $post = new Posts();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->description = $request->input('description');
        $post->staff_id = $request->input('staff_id');

       
        if($request->hasFile('image')){

            $old_image = 'uploads/post_image'.$post->image;
            if(file::exists($old_image)){
                file::delete($old_image);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //lay ten mo rong png, jpg, ..
            $filename = time().'.'.$extension;
            $file->move('uploads/post_image', $filename);
            $post->image = $filename;
        }

        $post->save();

        return response()->json($post);
    }

    public function update_(Request $request, $id){
        $post = Posts::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->description = $request->input('description');
        $post->staff_id = $request->input('staff_id');

       
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

    public function delete(Request $request, $id)
    {
        $post = Posts::find($id);
        $post->delete();

        return response()->json($post);
    }
}