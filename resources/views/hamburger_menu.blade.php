<!-- ハンバーガーメニューボタン -->

<section class="hamburger d-md-none">
  <a href="#" class="nav-button">
    <span></span>
    <span></span>
    <span></span>
  </a>
</section>

<!-- ハンバーガーメニュのモーダル -->
<nav class="menu-area purple-gradiend d-md-none">
  <ul class="nav-modal mb-0 text-center">
  @guest
    <li>
      <a href="{{ route('register') }}" class="waves-effect waves-light modal-link">
        <i class="fas fa-user-plus mr-1"></i>
        ユーザー登録
      </a>
    </li>

    <li>
      <a href="{{ route('login') }}" class="waves-effect waves-light modal-link">
        <i class="fas fa-sign-in-alt mr-1"></i>
        ログイン
      </a>
    </li>

    <li class="bg-default rounded">
      <a href="{{ route('login.guest') }}" class="waves-effect waves-light modal-link">
        <i class="fas fa-user-check mr-1"></i>
        ゲストログイン
      </a>
    </li>
  @endguest

  @auth
    <li>
      <a href="{{ route('meetings.index') }}" class="waves-effect waves-light modal-link">
        <i class="fas fa-video mr-2"></i>
        Zoom練習会
      </a>
    </li>

    <li>
      <a href="{{ route('articles.create') }}" class="waves-effect waves-light modal-link">
        <i class="fas fa-pen mr-2"></i>
        投稿する
      </a>
    </li>

    <li>
      <a class="waves-effect waves-light modal-link" onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'" >
      <i class="fas fa-user mr-1"></i>
        マイページ
      </a>
    </li>

    <li>
      <button form="logout-button" class="button-reset waves-effect waves-light text-white modal-link" type="submit">
        <i class="fas fa-sign-out-alt mr-1"></i>
        ログアウト
      </button>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
      @csrf
    </form>
  @endauth
  
  </ul>
</nav>