<!-- メインタグ -->

<div class="card mb-4 sidebar-content">
  <div class="card-header text-center">
    <i class="fas fa-tags mr-2"></i>
    メインタグ
  </div>
  <div class="card-body main-tag-list py-2 mx-auto">
  <a href="{{
      \App\Tag::where('name', 'プレゼン練習')->first()
      ? route('tags.show', ['name' => 'プレゼン練習'])
      : ''
    }}">
      <p>#プレゼン練習</p>
    </a>
    <a href="{{
      \App\Tag::where('name', 'プレゼン')->first()
      ? route('tags.show', ['name' => 'プレゼン'])
      : ''
    }}">
      <p>#プレゼン</p>
    </a>
    <a href="{{
      \App\Tag::where('name', '練習会')->first()
      ? route('tags.show', ['name' => '練習会'])
      : ''
    }}">
      <p>#練習会</p>
    </a>
    <a href="{{
      \App\Tag::where('name', '発表練習')->first()
      ? route('tags.show', ['name' => '発表練習'])
      : ''
    }}">
      <p>#発表練習</p>
    </a>
    <a href="{{
      \App\Tag::where('name', 'LT練習')->first()
      ? route('tags.show', ['name' => 'LT練習'])
      : ''
    }}">
      <p>#LT練習</p>
    </a>
  </div>
</div>