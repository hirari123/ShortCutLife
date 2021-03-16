@extends('app')

@section('title', 'ユーザー登録')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      <div class="col-md-7 mx-auto">
        <div class="card mt-5">
          <h2 class="h4 card-header text-center purple-gradient text-white">ユーザー登録</h2>

          <div class="card-body">

            @include('error_card_list')

            <div class="user-form my-4">
              <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- ユーザー名の項目 -->
                <div class="form-group">
                  <label for="name">
                    ユーザー名
                    <small class="text-danger">(必須)</small>
                  </label>
                  <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="※15文字以内">
                </div>

                <!-- メールアドレスの項目 -->
                <div class="form-group">
                  <label for="email">
                    メールアドレス
                    <small class="text-danger">(必須)</small>
                  </label>
                  <input class="form-control" type="text" id=email name="email" value="{{ old('email') }}" placeholder="※(例)chotplay@chotplay.com" >
                </div>

                <!-- パスワードの項目 -->
                <div class="form-group">
                  <label for="password">
                    パスワード
                    <small class="text-danger">(必須)</small>
                  </label>
                  <input class="form-control" type="password" id="password" name="password" placeholder="※英数字8文字以上">
                </div>

                <!-- パスワード確認の項目 -->
                <div class="form-group">
                  <label for="password-confirm">
                    パスワード(確認用)
                    <small class="text-danger">(必須)</small>
                  </label>
                  <input class="form-control" type="password" id="password-confirmation" name="password_confirmation" placeholder="※パスワードを再入力">
                </div>

                <!-- 登録ボタン -->
                <button type="submit" class="btn rounded-pill btn-block purple-gradient">
                  <span class="h6">ユーザー登録</span>
                </button>
              </form>

              <!-- ログインはこちら -->
              <div class="mt-3">
                <a href="{{ route('login') }}" class="text-primary">ログインはこちら</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection