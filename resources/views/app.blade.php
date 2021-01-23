<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">

    <!-- トップページのCSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    
  </head>

  <body>
    <div id="app">
      <header id="js-pageheader" class="pageheader">
        <div class="pageheader-inner">
          <div class="pageheader-col">
            <h1 class="pageheader-logo">
              <a href="/">CHOT PLAY</a>
            </h1>
            <div class="pageheader-search">
              <form method="get" name="event" action="">
                @csrf
                <input id="kw_search" type="text" class="pageheader-search-input" name="keyword" autocomplete="off" placeholder="イベント検索" value="">
                <button id="searchBtn" class="pageheader-search-btn" type="submit">
                  <i class="fa fa-search" aria-label="キーワード検索する"></i>
                </button>
              </form>
              <div id="suggest" style="display: none;"></div>
            </div>
          </div>

          <div class="pageheader-col">
            <div class="pageheader-login">
              <ul>

                @guest
                <li>
                  <a href="{{ route('login') }}">ログイン</a>
                </li>
                |
                @endguest

                @guest
                <li>
                  <a href="{{ route('register') }}">新規会員登録</a>
                </li>
                |
                @endguest

                @guest
                <li>
                  <a href="">ゲストログイン</a>
                </li>
                @endguest

              </ul>
            </div>

            @auth
            <div class="pageheader-login">
              <a href="{{ route('articles.create') }}">練習会を開く</a>
            </div>
            |
            @endauth

            @auth
            <button class="dropdown-item" type="button" onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
              マイページ
            </button>
            |
            @endauth

            @auth
            <button form="logout-button" class="dropdown-item" type="submit">
              ログアウト
            </button>
            @endauth
          </div>
          
        </div>
      </header>
        @yield('content')
    </div>

    <!-- JavaScript -->
    <script src="{{ mix('/assets/js/app.js') }}"></script>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>

  </body>

</html>