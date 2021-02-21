<!-- ミーティング一覧 -->

@extends('app')

@section('title', 'ミーティング一覧 | CHOT SHOT')

@section('content')

  @include('nav')

  <div class="container mt-4">
    <div class="row">
      <div class="mx-auto col-md-7">
        @include('meetings.list', compact('meetings'))

        @include('meetings.sppiner')
      </div>
    </div>

    @include('meetings.new_post_btn')
  </div>
  
@endsection