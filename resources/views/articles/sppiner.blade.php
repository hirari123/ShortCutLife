<!-- 記事の無限スクロール -->

@if ($articles->nextPageUrl())
  <a href="{{ $articles->appends(request()->only('search'))->nextPageUrl() }}" infinity-scroll>
    <div class="d-flex justify-content-center my-4">
      <div class="sppiner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </a>
@endif