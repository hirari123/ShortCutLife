<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment)
    {
        // 二重送信の対策
        $request->session()->regenerateToken();

        $user = auth()->user();
        $comment->user_id = $user->id;
        $comment->save();

        session()->flash('msg_success', 'コメントを投稿しました');

        return back();
    }
}
