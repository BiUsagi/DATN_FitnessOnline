<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function posts()
    {
        $TopBlog = Posts::orderBy('id', 'DESC')->paginate(3); // Lấy post theo thứ tự từ bài post mới nhát
        $onlyBlog = Posts::orderBy('id', 'DESC')->get();
        return view('frontend/posts/posts')->with(
            [
                'TopBlog' => $TopBlog,
                'onlyBlog' =>$onlyBlog
            ]
        );
    }
    public function posts_details($id)
    {
        $posts = Posts::findOrFail($id); // Tìm bài viết theo id
        $showUser = Auth::user();
        $onlyBlog = Posts::orderBy('id', 'DESC')->get();
        return view('frontend/posts/posts-details', compact('posts', 'showUser','onlyBlog'));
    }

}
