<!-- 記事一覧のビュー -->

@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  <div class="container">
    @foreach($articles as $article)
      <div class="card mt-3">
        <div class="card-header bg-warning text-dark py-2 d-flex bd-highlight">
          <i class="fas fa-user-circle fa-3x mr-1 pr-2 bd-highlight"></i>
          <div class="font-weight-bold mt-4 bd-highlight">
            {{ $article->user->name }}
          </div>
          <div class="font-weight-lighter float-right ml-auto bd-highlight mt-4">
            {{ $article->created_at->format('Y/m/d H:i') }}
          </div>
        </div>
        <div class="card-body pt-0 pb-2">
          <h3 class="h4 card-title my-4">
            {{ $article->title }}
          </h3>
          <div class="card-text my-4">
            {!! nl2br(e( $article->body )) !!}
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection