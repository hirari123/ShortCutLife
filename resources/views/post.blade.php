<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Script -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <body>
    <main class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <tr>
              <th>タイトル</th>
              <th>いいね数</th>
              <th>コメント数</th>
              <th>作成日</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
              <td>{{ $post['title'] }}</td>
              <td>{{ $post['like_count'] }}</td>
              <td>{{ $post['comments_count'] }}</td>
              <td>{{ $post['created_at'] }}</td>
            </tr>
            @endforeach
          </div>
        </div>
      </div>
    </main>
  </body>
</html>