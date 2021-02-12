<!-- タグ別記事一覧画面 -->

@extends('app')

@section('title', $tag->hashtag)

@section('content')
  @include('nav')
  <div class="container">
    <div class="card card_color mt-5 mb-4">
      <div class="card-body text-center p-3">
        <h2 class="h4 card-title m-0">
          {{ $tag->hashtag }}
        </h2>
        <div class="card-text text-right">
          {{ $tag->articles->count() }}件
        </div>
      </div>
    </div>
    @foreach ($tag->articles as $article)
      @include('articles.card')
    @endforeach
  </div>

  @auth
  <div class="new-post">
    <a href="{{ route('articles.create') }}" class="new-article-btn">
      <p>練習予約</p>
      <i class="fas fa-plus"></i>
    </a>
  </div>
  @endauth
@endsection