<!-- プロフィール編集画面 -->

@extends('app')

@section('title', 'プロフィール編集')

@section('content')
  @include('nav')
  <div class="container my-5">
    <div class="row">
      <div class="mx-auto col-md-7">
        <div class="card">
          <h2 class="h4 card-header text-center purple-gradient text-white">プロフィール編集</h2>
          <div class="card-body">

            @include('error_card_list')

            <div class="user-form my-4">
              <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                @if (Auth::id() == config('usr.guest_user_id'))
                  <p class="text-danger">
                    <b>※ゲストユーザーは、以下を編集できません。</b><br>
                    ・ユーザー名<br>
                    ・メールアドレス<br>
                  </p>
                @endif

                <div class="form-group">
                  <label for="name">
                    ユーザー名
                    <small class="blue-grey-text">（15文字以内）</small>
                  </label>

                  @if (Auth::id() == config('user.guest_user_id'))
                    <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}" readonly>
                  @else
                    <input class="form-control" type="text" id="name" name="name" value="{{ $user->name ?? old('name') }}">
                  @endif
                </div>

                <div class="form-group">
                  <label for="email">メールアドレス</label>
                  @if (Auth::id() == config('user.guest_user_id'))
                    <input class="form-control" type="text" id="email" name="email" value="{{ $user->email }}" readonly>
                  @else
                    <input class="form-control" type="text" id="email" name="email" value="{{ $user->email ?? old('email') }}">
                  @endif
                </div>

                <div class="form-group">
                  <label for="email">
                    自己紹介文
                    <small class="blue-grey-text">（200文字以内）</small>
                  </label>
                  <textarea name="self_introduction" rows="8" class="form-control">
                    {{ $user->self_introduction ?? old('self_introduction') }}
                  </textarea>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <button class="btn purple-gradient mt-2 mb-2" type="submit">
                    <span class="h6">保存する</span>
                  </button>
                  <a href="{{ route('users.edit_password', ['name' => $user->name]) }}">パスワード変更はこちら</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection