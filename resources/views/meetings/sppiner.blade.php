<!-- 記事の無限スクロール -->

@if ($meetings->nextPageUrl())
  <a href="{{ $meetings->nextPageUrl() }}" infinity-scroll>
    <div class="d-flex justify-content-center my-4">
      <div class="spinner-border" role="status">
        <span class="sr-onry">Loading...</span>
      </div>
    </div>
  </a>
@endif