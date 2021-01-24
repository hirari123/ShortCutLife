<!-- 記事一覧のビュー -->

@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  <div class="container">
    <div class="top-wrapper"></div>
    @foreach($articles as $article)

      @include('articles.card')

    @endforeach
  </div>
@endsection