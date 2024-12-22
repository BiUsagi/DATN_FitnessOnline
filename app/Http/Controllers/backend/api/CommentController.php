<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Report;
class CommentController extends Controller
{



    // SHOW BÌNH LUẬN CHA
    public function index()
    {
        $comments = Comment::with('user','posts')
        ->where('rep',0)
        ->where('report', 0)
        ->get()
        ->map(function ($comment) {
            return [
                'id' => $comment->id,
                'content' => $comment->content,
                'user_name' => $comment->user->user_name ?? 'N/A',
                'avatar' => $comment->user->avatar ?? 'N/A',
                'title'=> $comment->posts->title ?? 'N/A' ,
                'created_at' => $comment->created_at,
            ];
        });
    return response()->json($comments);
    }


    
    // SHOW BÌNH LUẬN CON
    public function show($id)
    {

        $comment = Comment::with(['user', 'posts', 'replies.user', 'replies.replies.user'])->find($id);
        // Lấy các phản hồi của bình luận chính
        $replies = Comment::with('user')
            ->where('rep', $id)
            ->where('report', 0)
            ->get()
            ->map(function ($reply) {
                return [
                    'id' => $reply->id,
                    'content' => $reply->content,
                    'user_name' => $reply->user->user_name ?? 'N/A',
                    'avatar' => $reply->user->avatar ?? 'N/A',
                    'created_at' => $reply->created_at,
                ];
            });

        // Kết hợp dữ liệu bình luận chính và các phản hồi
        $result = [
            'id' => $comment->id,
            'content' => $comment->content,
            'title' => $comment->posts->title ?? 'N/A',
            'user_name' => $comment->user->user_name ?? 'N/A',
            'user_avatar' => $comment->user->avatar ?? 'N/A',
            'created_at' => $comment->created_at,
            'rep' => $replies,
        ];

        return response()->json($result);
    }


    // XÓA BÌNH LUẬN
    public function delete($id) 
{
    $comment = Comment::with('replies')->find($id);
    
    if ($comment) {
        // Xóa bình luận con nếu có
        foreach ($comment->replies as $reply) {
            $reply->delete();
        }
        
        // Xóa bình luận cha
        $comment->delete();

        return response()->json(['message' => 'Xóa bình luận thành công.'], 200);
    }

    return response()->json(['message' => 'Bình luận không tồn tại.'], 404);
}

public function ReportedComments()
{
    $reportedComments = Comment::where('report', '>=', 1) // Lọc các comment bị report
        ->with(['replies' => function ($query) {
            $query->where('report', '>=', 1); // Lọc các reply bị report
        }, 'user', 'posts'])
        ->get()
        ->map(function ($comment) {
            return [
                'id' => $comment->id,
                'content' => $comment->content,
                'user_name' => $comment->user->user_name ?? 'N/A',
                'avatar' => $comment->user->avatar ?? 'N/A',
                'title' => $comment->posts->title ?? 'N/A',
                'created_at' => $comment->created_at,
                'replies' => $comment->replies->map(function ($reply) {
                    return [
                        'id' => $reply->id,
                        'content' => $reply->content,
                        'user_name' => $reply->user->user_name ?? 'N/A',
                        'avatar' => $reply->user->avatar ?? 'N/A',
                        'created_at' => $reply->created_at,
                    ];
                })
            ];
        });

    return response()->json($reportedComments);
}
public function showCommentreport($id)
{
    $comment = Comment::with('replies', 'user')
        ->with(['reports' => function ($query) {
            $query->with('user'); // Lấy thông tin người báo cáo
        }])
        ->findOrFail($id);

    return response()->json([
        'id' => $comment->id,
        'content' => $comment->content,
        'created_at' => $comment->created_at,
        'user_name' => $comment->user->user_name,
        'user_avatar' => $comment->user->avatar,
        'title' => $comment->posts->title ?? 'Không xác định',
        'rep' => $comment->replies->map(function ($reply) {
            return [
                'id' => $reply->id,
                'user_name' => $reply->user->user_name,
                'avatar' => $reply->user->avatar,
                'content' => $reply->content,
            ];
        }),
        'reports' => $comment->reports->map(function ($report) {
            return [
                'report_content' => $report->report_content,
                'created_at' => $report->created_at,
                'user_name' => $report->user->user_name,
                'user_avatar' => $report->user->avatar,
            ];
        }),
    ]);
}

}
