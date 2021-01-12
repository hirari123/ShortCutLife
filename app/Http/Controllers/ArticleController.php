<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // ArticlePolicyの使用
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at')->load(['user', 'likes', 'tags']); //(N + 1)問題

        return view('articles.index', ['articles' => $articles]);
    }

    // 記事投稿画面を表示
    public function create()
    {
        // タグテーブル全てのタグ情報をform.blade.phpに渡す
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' =>$tag->name];
        });

        return view('articles.create', [
            'allTagNames' => $allTagNames,
        ]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        // モデルの新規登録
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        // araticlesテーブルにレコードを新規登録
        $article->save();
        // タグの登録と記事・タグの紐付け
        $request->tags->each(function($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index');
    }

    // 記事更新画面を表示
    public function edit(Article $article)
    {

        $tagNames = $article->tags->map(function($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }

    // 記事更新処理
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        // タグの登録と記事・タグの紐付け登録・削除を行う
        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index');
    }

    // 記事削除処理
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    // 記事詳細表示
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    // 「いいね」機能の追加
    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }
}
