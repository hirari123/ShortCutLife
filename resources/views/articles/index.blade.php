<!-- 記事一覧のビュー -->

@extends('app')

@section('title', '記事一覧')

@section('content')
  <div class="nav-tops">
    @include('nav')
  </div>

  @guest
  <div class="top-images top-bg-img">
    <div class="top-inner top-text">
      <div class="titles d-flex justify-content-between mb-1">
        <img src="/assets/images/titleIcon.png" alt="タイトルアイコン">
        <h1 class="ml-2">CHOT PLAY</h1>
      </div>
      <p class="h5 my-2 pb-3">発表練習専用アプリ</p>
      <div class="d-flex justify-content-between">
        <a href="{{ route('login') }}" class="btn purple-gradient waves-effect waves-light p-2 text-white mr-2" style="letter-spacing: 0.2em;">
          <i class="fas fa-sign-in-alt mr-1"></i>ログイン
        </a>

        <a href="{{ route('login.guest') }}" class="btn btn-default waves-effect waves-light p-2 text-white" style="letter-spacing: 0.2em;">
          <i class="fas fa-user-check mr-1"></i>ゲストログイン
        </a>
      </div>
    </div>
  </div>
  @endguest

  @auth
  <div class="main-images main-bg-img">
    <div class="main-inner main-text">
      練習予定を立てよう
    </div>
  </div>
  @endauth
  
  <div class="container mt-4">
    <div class="row d-flex justify-content-between">
      <div class="row col-md-12">

      <aside class="col-3 mt-3 d-none d-md-block position-fixed">
        @include('sidebar.sidelist')
      </aside>

      <main class="col-md-7 offset-md-5">

        @include('articles.list')

        @include('articles.sppiner')

        @include('articles.new_post_btn')

      </main>

      </div>
    </div>
  </div>
@endsection