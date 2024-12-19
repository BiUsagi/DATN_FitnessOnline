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
        $onlyBlog = Posts::where('staff_id', $posts->staff_id)
                     ->where('id', '!=', $id) // Loại trừ bài viết hiện tại
                     ->orderBy('id', 'DESC')
                     ->take(3) // Giới hạn số lượng bài viết liên quan
                     ->get();
        return view('frontend/posts/posts-details', compact('posts', 'showUser','onlyBlog'));
    }
    public function searchPosts(Request $request)
    {
        $query = $request->input('query');
        $posts = Posts::where('title', 'LIKE', "%{$query}%")->take(5)->get(); // Tìm kiếm theo tên bài viết

        return response()->json($posts);
    }
}
