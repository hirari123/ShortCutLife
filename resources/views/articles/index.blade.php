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
      <p class="h5">発表練習専用アプリ</p>
    </div>
  </div>
  @endguest

  @auth
  <div class="main-images main-bg-img">
    <div class="main-inner main-text">
      CHOT PLAY
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