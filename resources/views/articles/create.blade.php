<!-- 記事投稿画面 -->

@extends('app')

@section('title', '記事投稿')

@include('nav')

@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="mx-auto col-md-7">
        <div class="card">
          <h2 class="h4 card-header text-center purple-gradient text-white">練習日を決めよう!!</h2>
          <div class="card-body pt-3">
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('articles.store') }}">
                @include('articles.form')
                <div class="w-75 mx-auto d-flex justify-content-between align-items-start">
                  <!-- 送信ボタン -->
                  <div style="width: 45%;">
                    <button type="submit" class="btn purple-gradient btn-block">
                      <span class="h3">送 信</span>
                    </button>
                  </div>

                  <!-- 戻るボタン -->
                  <div style="width: 45%;">
                    <button type="button" class="btn btn-outline-primary btn-block" onclick="location.href='{{ route('articles.index') }}'">
                      <span class="h6">戻る</span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection