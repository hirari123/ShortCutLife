<!-- 記事投稿画面・記事更新画面 -->

@csrf
<div class="md-form">
  <label>タイトル</label>
  <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
</div>

<div class="form-group mt-3">
  <article-tags-input
  
    :initial-tags='@json($tagNames ?? [])'
    :autocomplete-items='@json($allTagNames ?? [])'
  
  >
  </article-tags-input>
</div>

<div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="10" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
</div>