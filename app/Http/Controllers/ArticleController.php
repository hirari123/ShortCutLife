<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');

        return view('articles.index', ['articles' => $articles]);
    }

    // 記事投稿画面を表示
    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request, Article $article)
    {
        // モデルの新規登録
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        // araticlesテーブルにレコードを新規登録
        $article->save();
        return redirect()->route('articles.index');
    }
}
