<!-- ナビゲーションバー -->
  <nav class="navbar navbar-expand navbar-dark px-5 fixed-top purple-gradient">
    <a class="navbar-brand mr-auto" href="/" style="font-size: 1.5rem;">
    <img src="/assets/images/titleIcon.png" alt="タイトルアイコンマイク">
    CHOT PLAY
    </a>

    @if (isset($articles))
      <form method="GET" action="{{ route('articles.index') }}" class="search-form form-inline w-25 d-none d-md-flex">
        <span></span>
        <input class="form-control w-100" type="search" name="search" placeholder="投稿を検索" value="{{ $search ?? old('search') }}">
      </form>
    @elseif (isset($meetings))
      <form method="GET" action="{{ route('meetings.index') }}" class="search-form form-inline w-25 d-none d-md-flex">
        <span></span>
        <input class="form-control w-100" type="search" name="search" placeholder="練習を検索" value="{{ $search ?? old('search') }}">
      </form>
    @else
      <!-- 検索フォームを表示しない -->
    @endif

    <ul class="navbar-nav ml-auto">

      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus mr-1"></i>ユーザー登録</a>
      </li>
      @endguest

      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt mr-1"></i>ログイン</a>
      </li>
      @endguest

      @guest
      <li class="nav-item bg-default rounded">
        <a class="nav-link waves-effect waves-light" href="{{ route('login.guest') }}"><i class="fas fa-user-check mr-1"></i>ゲストログイン</a>
      </li>
      @endguest

      @auth
      <li class="nav-item">
        <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>練習日を決める</a>
      </li>
      @endauth

      @auth
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <button class="dropdown-item" type="button" onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
            マイページ
          </button>
          <div class="dropdown-divider"></div>
          <button form="logout-button" class="dropdown-item" type="submit">
            ログアウト
          </button>
        </div>
      </li>
      <form id="logout-button" method="POST" action="{{ route('logout') }}">
        @csrf
      </form>
      <!-- Dropdown -->
      @endauth

    </ul>
  </nav>
