<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ユーザー新規登録、ログイン、ログアウト
Auth::routes();

// "/"のルーティング
Route::get('/', function () {
  return view('top');
});

// 記事投稿画面のルーティング
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);

// 「いいね」機能のルーティングを追加
Route::prefix('articles')->name('articles.')->group(function () {
  Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
  Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});

// タグ別記事一覧画面のルーティング
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

// ユーザーページのルーティング
Route::prefix('users')->name('users.')->group(function () {
  Route::get('/{name}', 'UserController@show')->name('show');
  // 「いいね」のタブが押されたときのユーザーページの表示
  Route::get('/{name}/likes', 'UserController@likes')->name('likes');
  // フォロー中・フォロワーの一覧を表示する
  Route::get('/{name}/followings', 'UserController@followings')->name('followings');
  Route::get('/{name}/followers', 'UserController@followers')->name('followers');
  // フォロー機能のルーティング  ログインユーザーのみ
  Route::middleware('auth')->group(function () {
    Route::put('/{name}/follow', 'UserController@follow')->name('follow');
    Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
  });
});

// ゲストユーザーログイン
Route::post('login/guest', 'Auth\LoginController@guestLogin')->name('login.guest');

// Route::get('/sass', function() {
//   return view('sass');
// });