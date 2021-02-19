<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use App\User;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // タグ別記事一覧画面のアクションメソッドを作成
    public function show(string $name, User $user)
    {
        $tag = Tag::where('name', $name)->first();

        // 投稿日が新しい順に並べ替える
        $tag->articles = $tag->articles->sortByDesc('created_at');

        return view('tags.show', ['tag' => $tag]);
    }
}
