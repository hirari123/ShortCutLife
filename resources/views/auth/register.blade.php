@extends('app')

@section('title', 'ユーザー登録')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mt-5 mb-5">
        <div class="card-header bg-dark text-light h5">ユーザー登録</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- ユーザー名の項目 -->
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名</label>

              <div class="col-md-6">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <!-- メールアドレスの項目 -->
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

              <div class="col-md-6">
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <!-- パスワードの項目 -->
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

              <div class="col-md-6">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <!-- パスワード確認の項目 -->
            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード(確認用)</label>

              <div class="col-md-6">
                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" require autocomplete="new-password">
              </div>
            </div>

            <!-- 登録ボタン -->
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  ユーザー登録
                </button>
              </div>
            </div>

            <!-- ログインはこちら
            <div class="mt-0">
              <a href="{{ route('login') }}" class="card-text">
                ログインはこちら
              </a>
            </div> -->

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection