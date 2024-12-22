<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function index(){
        
        $pt_id = Staff::where('user_id',Auth::user()->id)->first();

        $user = Auth::user();
        if($user->role_012 === 2) {
            $data = Posts::orderBy('id', 'asc')->get();
        }else {
            $data = Posts::where('staff_id',$pt_id->id)->get();
        }   

        return view('backend/posts/index',['post'=>$data]);
    }


    public function create(){

        $pt_id = Staff::where('user_id',Auth::user()->id)->first();
                               
        return view('backend/posts/create',['pt_id'=>$pt_id]);
    }


    public function update($id){

        $pt_id = Staff::where('user_id',Auth::user()->id)->first();

        $post = Posts::find($id);

        return view('backend/posts/update', ['post' => $post, 'pt_id'=>$pt_id]);
    }
}
