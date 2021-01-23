<!-- ログインフォーム -->

@extends('app')

@section('title', 'ログイン')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-5">
      <div class="login-box card mt-5 mb-5">
        <div class="login-header card-header bg-dark text-light">
          登録済みの方はこちらからログイン
        </div>

        <div class="login-body card-body">
          <form method="post" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label text-md-right">メールアドレス</label>

              <div class="col-md-6">
                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" require autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-mb-4 col-form-label text-md-right">パスワード</label>

              <div class="col-md-6">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-8 offset-md-4">
                <div class="check-box">
                  <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  
                  <label for="remember" class="form-check-label">
                    ログインしたままにする
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary btn-rounded active">
                  ログイン
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection