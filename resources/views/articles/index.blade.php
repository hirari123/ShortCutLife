<!-- 記事一覧のビュー -->

@extends('app')

@section('title', '記事一覧')

@section('content')
  <div class="container">
    <img src="{{ asset('/assets/images/meeting-2954348_1280.jpg') }}" alt="メイン画像">
    @foreach($articles as $article)

      @include('articles.card')

    @endforeach
  </div>
@endsection