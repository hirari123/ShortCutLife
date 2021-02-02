<!-- 記事一覧のビュー -->

@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')

  @guest
  <div class="top-images"></div>
  @endguest

  @auth
  <div class="main-images"></div>
  @endauth
  
  <div class="container">
    <div class="practice-title">
      <h2>練習会日程の予定</h2>
    </div>
    @foreach($articles as $article)

      @include('articles.card')

    @endforeach
  </div>
@endsection