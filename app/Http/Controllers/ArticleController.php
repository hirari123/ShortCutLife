<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Tag;
use App\User;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ArticleController extends Controller
{
    // ArticlePolicyの使用
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index(Request $request, User $user)
    {
        // ユーザー投稿の検索機能
        $search = $request->input('search');

        $query = Article::query();

        // キーワードがあれば
        if($search !== null) {
            // 全角スペースを半角に
            $search_split = mb_convert_kana($search, 's');

            // 空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);

            // 単語をループで回す
            foreach($search_split2 as $value)
            {
                $query->where('body', 'like', '%'.$value.'%');
            }
        };

        // 投稿一覧を無限スクロールで表示

        $articles = $query->with(['user', 'likes', 'tags'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('articles.list', ['articles' => $articles])->render(),
                'next' => $articles->appends($request->only('search'))->nextPageUrl()
            ]);
        }

        return view('articles.index', [
            'articles' => $articles,
            'search' => $search
            ]);
    }

    // 記事投稿画面を表示
    public function create()
    {
        // タグテーブル全てのタグ情報をform.blade.phpに渡す
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' =>$tag->name];
        });

        $user = Auth::user();

        return view('articles.create', [
            'allTagNames' => $allTagNames,
            'user' => $user,
        ]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        // 二重送信の対策
        $request->session()->regenerateToken();

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
        DB::transaction(function() use ($request, $article) {
            $article->fill($request->all())->save();
            $article->tags()->detach();
            $request->tags->each(function ($tagName) use ($article) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $article->tags()->attach($tag);
            });

            session()->flash('msg_success', '投稿を編集しました');
        });

        return redirect()->route('articles.index');
    }

    // 記事削除処理
    public function destroy(Article $article)
    {
        $article->delete();

        session()->flash('msg_success', '投稿を削除しました');

        return redirect()->route('articles.index');
    }

    // 記事詳細表示
    public function show(Article $article, Comment $comment)
    {
        $comments = $article->comments()
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('articles.show', [
            'article' => $article,
            'comments' => $comments
        ]);
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
