<!-- ナビゲーションバー -->
  <nav class="navbar navbar-expand navbar-dark fixed-top blue-gradient">
    <a class="navbar-brand mr-auto" href="/"><i class="fas fa-bullhorn mr-1"></i>CHOT PLAY</a>
    <ul class="navbar-nav ml-auto">

      <!-- @guest
      <li class="nav-item mr-5">
        <div class="input-group">
          <div class="form-outline">
            <input type="search" id="form1" class="form-control">
            <label class="form-label" for="form1">Search</label>
          </div>
          <button type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </li>
      @endguest -->

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
        <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
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
