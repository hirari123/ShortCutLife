<!-- 新規投稿ボタン -->

@auth
  <div class="new-post">
    <a href="{{ route('articles.create') }}" class="new-article-btn">
      <p>練習予約</p>
      <i class="fas fa-plus"></i>
    </a>
  </div>
@endauth
