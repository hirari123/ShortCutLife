<!-- Zoom編集画面 -->

@extends('app')

@section('title', 'Zoomミーティング編集')

@section('content')

  @include('nav')

  <div class="container my-5">
    <div class="row">
      <div class="mx-auto col-md-7">
        <div class="card">
          <h2 class="h4 card-header blue-gradient text-center text-white">練習概要を編集</h2>
          <div class="card-body pt-3">
          
            @include('error_card_list')

            <div class="my-4">
              <form method="POST" action="{{ route('meetings.update', ['meeting' => $meeting]) }}" class="w-75 mx-auto">
                @method('PATCH')
                @include('meetings.form')

                <div class="mt-4">
                  <button type="submit" class="btn btn-block blue-gradient mt-2 mb-2" text-white>
                    <span class="h5">更新する</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection