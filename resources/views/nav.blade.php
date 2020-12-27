<!-- ナビゲーションバー -->

<nav class="navbar navbar-expand navbar-light px-5" style="background-color: #fafafa;">

  <a class="navbar-brand text-dark" href="/"><i class="far fa-sticky-note mr-1 text-dark"></i>コーリツライフ</a>

  <ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <a class="nav-link text-dark" href="">ユーザー登録</a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-dark" href="">ログイン</a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-dark" href=""><i class="fas fa-pen mr-1"></i>投稿する</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle text-dark"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href=''">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="">
    </form>
    <!-- Dropdown -->

  </ul>

</nav>