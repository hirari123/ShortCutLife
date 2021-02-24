<!-- パスワード変更画面 -->

@extends('app')

@section('title', 'プロフィール編集')

@section('content')
  @include('nav')
  <div class="container my-5">
    <div class="row">
      <div class="mx-auto col-md-7">
        <div class="card">
          <h2 class="h4 card-header text-center purple-gradient text-white">パスワード変更</h2>
          <div class="card-body">

            @include('error_card_list')

            <div class="user-form my-4">
              <form method="POST" action="{{ route('users.update_password', ['name' => $user->name]) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="form-group">
                  <label for="current_password">
                    現在のパスワード
                  </label>
                  <input class="form-control" type="password" id="current_password" name="current_password" placeholder="現在のパスワードを入力してください">
                </div>

                <div class="form-group">
                  <label for="new_password">
                    新しいパスワード
                  </label>
                  <input class="form-control" type="password" id="new_password" name="new_password" placeholder="※8文字以上">
                </div>

                <div class="form-group">
                  <label for="new_password_confirmation">
                    パスワードを確認
                  </label>
                  <input class="form-control" type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="新しいパスワードを再入力してください">
                </div>

                <div class="d-flex justify-content-center align-items-center">
                  <button class="btn purple-gradient mt-2 mb-2" type="submit">
                    <span class="h6">保存する</span>
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