<!-- トップページ -->

@extends('app')

@section('title', 'トップ画面')

@section('content')
  <nav class="navbar navbar-expand navbar-light px-5" style="background-color: #ffffff;">
    <a class="navbar-brand text-dark" href="/">
      <i class="far fa-sticky-note mr-1 text-dark"></i>
      コーリツライフ
    </a>
  </nav>

  <div class="top-contents my-0">
    <div class="top-wrapper" style="color: #fafafa;">
      <div class="bg-opacity text-dark">
        <h1>
          <div class="row">
            <div class="mx-auto mt-5">
              コーリツライフで
            </div>
          </div>

          <div class="row">
            <div class="mx-auto">
              アイディアをシェアして<span style="color: #ffddaa;">心豊かに</span>しよう
            </div>
          </div>
        </h1>
        <br>
        <div class="row">
          <div class="mx-auto">
            <h3>
              "コーリツライフ"は時短アイディアを出し合い<br>
              自分の時間を作るための情報共有コミュニティです
            </h3>
          </div>
        </div>

        <div class="login-contents">
          <div class="row">
            <div class="mx-auto mb-2">
              <div class="float-left">
                <a href="{{ route('register')}}" class="btn btn-success btn-rounded">新規登録</a>
              </div>
              <div class="float-right">
                <form method="post" action="{{ route('login.guest') }}">
                  @csrf
                  <input type="hidden" name="email" value="guest@gmail.com">
                  <input type="hidden" name="password" value="guest1234">
                  <button type="submit" class="btn btn-info btn-rounded">ゲストログイン</button>
                </form>
              </div>
            </div>
          </div>
        
          @yield('login_form')

        </div>
      </div>
    </div>

    <div class="container top-contents pt-3">
      <div class="row">
        <div class="col-md-5 mx-auto mt-3">
          <h4>コーリツライフで出来ること</h4>
          <ul>
            <li>ユーザー登録・ログイン機能</li>
            <li>プロフィール編集機能</li>
            <li>投稿の作成機能(モーダル画面,文字数カウント)</li>
            <li>画像の投稿機能</li>
            <li>コメント機能</li>
            <li>投稿とコメントの編集,削除機能</li>
            <li>いいね機能(非同期通信)</li>
            <li>目標摂取カロリー計算機能</li>
            <li>投稿の検索機能</li>
            <li>ページネーション</li>
            <li>ゲストログイン機能</li>
          </ul>
        </div>
        <div class="col-md-4 mr-auto mt-3">
          <h4>使用技術, 開発環境等</h4>
          <ul>
            <li>Laravel, PHP, MySQL</li>
            <li>JavaScript, JQuery, Bootstrap, Sass</li>
            <li>Git, GitHub, VSCode</li>
          </ul>
          <br>
          <h4>インフラ構成(AWS)</h4>
          <ul>
            <li>VPC, EC2, ELB(ALB)</li>
            <li>RDS, S3, Route53</li>
            <li>Apache, Amazon, Linux</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection