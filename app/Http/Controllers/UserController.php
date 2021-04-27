<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show(string $name, Request $request)
    {
        $user = User::where('name', $name)->first();

        // ユーザー詳細ページのユーザーによる投稿一覧10件ずつ取得
        $articles = $user->articles()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // 無限スクロールのajax処理
        if ($request->ajax()) {
            return response()->json([
                'html' => view('articles.list', ['articles' => $articles])->render(),
                'next' => $articles->nextPageUrl()
            ]);
        }

        // アップロードした画像を取得
        $uploads = UploadImage::orderBy('id', 'desc')->get();
        
        return view('image_list', [
            'images' => $uploads
        ]);


        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    public function edit(string $name)
    {
        $user = User::where('name', $name)->first();

        // UserPolicyのupdateメソッドでアクセス制限
        $this->authorize('update', $user);

        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, string $name)
    {
        $user = User::where('name', $name)->first();

        // UserPolicyのupdateメソッドでアクセス制限
        $this->authorize('update', $user);

        session()->flash('msg_success', 'プロフィールを編集しました');
        return redirect()->route('users.show', ['name' => $user->name]);
    }

    public function editPassword(string $name)
    {
        $user = User::where('name', $name)->first();

        // UserPolicyのupdateメソッドでアクセス制限
        $this->authorize('update', $user);

        return view('users.edit_password', ['user' => $user]);
    }

    public function updatePassword(UpdatePasswordRequest $request, string $name)
    {
        $user = User::where('name', $name)->first();

        // UserPolicyのupdateメソッドでアクセス制限
        $this->authorize('update', $user);

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        session()->flash('msg_success', 'パスワードを更新しました');
    }

    // 「いいねした記事一覧を表示した状態のユーザーページ」表示のアクションメソッドを追加
    public function likes(string $name, Request $request)
    {
        $user = User::where('name', $name)->first();

        // いいねした投稿一覧を10件ずつ取得
        $articles = $user->likes()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // 無限スクロールのajax処理
        if ($request->ajax()) {
            return response()->json([
                'html' => view('articles.list', ['articles' => $articles])->render(),
                'next' => $articles->nextPageUrl()
            ]);
        }

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    // フォロー中の一覧を表示
    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();

        $followings = $user->followings()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    // フォロワー一覧を表示
    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();

        $followers = $user->followers()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    // フォロー機能のアクションメソッドを追加
    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}
