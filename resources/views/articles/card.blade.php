<!-- 記事1件分の表示 -->

<div class="card mt-3">
  <div class="card-header card_color text-dark py-2 d-flex bd-highlight">
    <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="in-link text-dark">
      <img class="user-icon rounded-circle" src="{{ $article->user->profile_image }}">
    </a>
    <div class="font-weight-bold mt-3 bd-highlight">
      <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
        {{ $article->user->name }}
      </a>
    </div>
    <div class="font-weight-lighter float-right ml-auto bd-highlight mt-4">
      {{ $article->created_at->format('Y/m/d H:i') }}
    </div>
  </div>

  @if( Auth::id() === $article->user_id )
    <!-- dropdown -->
    <div class="ml-auto card-text">
      <div class="dropdown">
        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <button type="button" class="btn btn-link text-muted m-0 p-2">
            <i class="fas fa-ellipsis-v"></i>
          </button>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="{{ route('articles.edit', ['article' => $article]) }}">
            <i class="fas fa-pen mr-1"></i>記事を更新する
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
            <i class="fas fa-trash-alt mr-1"></i>記事を削除する
          </a>
        </div>
      </div>
    </div>
    <!-- dropdown -->

    <!-- modal -->
    <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
            @csrf
            @method('DELETE')
            <div class="modal-body">
              {{ $article->title }}を削除します。よろしいですか？
            </div>
            <div class="modal-footer justify-content-between">
              <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
              <button type="submit" class="btn btn-danger">削除する</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal -->
  @endif

  <div class="card-body pt-3">
    <h3 class="h4 card-title">
      <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
        {{ $article->title }}
      </a>
    </h3>
    <div class="card-text pt-1">
      {{ $article->body }}
    </div>
  </div>

  <!-- タグを表示 -->
  @foreach ($article->tags as $tag)
    @if ($loop->first)
      <div class="card-body pt-0 pb-4 pl-3">
        <div class="cart-text line-height">
    @endif
          <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border border-success p-1 mr-1 mt-1 text-success">
            {{ $tag->hashtag }}
          </a>
    @if ($loop->last)
        </div>
      </div>
    @endif
  @endforeach

  <div class="card-footer py-1 d-flex justify-content-end bg-white">

    <!-- コメントアイコン -->
    <div class="d-flex align-items-center mr-3">
      <a class="in-link p-1" href="{{ route('articles.show', ['article' => $article]) }}"><i class="far fa-comment fa-fw fa-lg"></i></a>
      <p class="mb-0">{{ count($article->comments) }}</p>
    </div>

    <!-- いいねアイコン -->
    <div class="d-flex align-items-center">
      <div class="card-text">
        <article-like
          :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
          :initial-count-likes='@json($article->count_likes)'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('articles.like', ['article' => $article]) }}"
        >
        </article-like>
      </div>
    </div>

  </div>


</div>