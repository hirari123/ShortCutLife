<!-- コメント入力フォーム -->

<li class="card list-group-item">
  <div class="py-3">
    <form method="POST" action="{{ route('comments.store') }}">
      @csrf

      <div class="form-group row mb-0">
        <div class="col-md-12 p-3 w-100 d-flex">
          <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="in-link text-dark">
            <img src="{{ Auth::user()->profile_image }}" alt="プロフィールアイコン" class="user-icon rounded-circle">
          </a>
          <div class="ml-2 d-flex flex-column font-weight-bold">
            <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="in-link text-dark">
              <p class="mb-0">{{ Auth::user()->name }}</p>
            </a>
          </div>
        </div>
        <div class="col-md-12">
          @include('error_card_list')
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="comment" rows="4" class="form-control" placeholder="コメントを入力してください。">{{ old('comment') }}</textarea>
        </div>
      </div>

      <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
          <p class="mb-4 text-danger">250文字以内</p>
          <button type="submit" class="btn peach-gradient">
            コメントする
          </button>
        </div>
      </div>
    </form>
  </div>
</li>