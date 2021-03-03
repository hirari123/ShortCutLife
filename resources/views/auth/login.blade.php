<!-- ログインフォーム -->

@extends('app')

@section('title', 'ログイン')

@section('content')
  @include('nav')
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-7 mx-auto">
        <div class="card mt-5">
          <h2 class="h4 card-header purple-gradient text-center text-white">
            ログイン
          </h2>

          <div class="card-body">

            @include('error_card_list')
            
            <div class="user-form my-4">
              <form method="post" action="{{ route('login') }}">
                @csrf
  
                <div class="form-group">
                  <label for="email">メールアドレス</label>
                  <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                  <label for="password">パスワード</label>
                  <input class="form-control" type="password" id="password" name="password" >
                </div>

                <!-- 次回から自動でログイン -->
                <input type="hidden" name="remember" id="remember" value="on">

                <div class="d-flex justify-content-between">
                  <button type="submit" class="btn purple-gradient pr-4 pl-4" text-while>
                    ログイン
                  </button>
                  <a href="{{ route('login.guest') }}" class="btn btn-default waves-effect waves-light p-3 text-white">
                    ゲストログイン
                  </a>
                </div>
              </form>

              <div class="mt-3">
                <a href="{{ route('register') }}" class="text-primary">ユーザー登録はこちら</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection