<!-- ナビゲーションバー -->

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
      <form id="logout-button" method="POST" action="{{ route('logout') }}">
        @csrf
      </form>
      @endauth
    </div>
    
  </div>
</header>
