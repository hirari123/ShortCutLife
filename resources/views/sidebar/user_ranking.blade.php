<!-- 練習数ランキング

<div class="card m-4 sidebar-content">
  <div class="card-header d-flex align-items-center row m-0 text-center">
    <div class="col-10 pl-0">
      <i class="fas fa-crown mr-2 text-warning fa-lg"></i>
      <span class="mr-1">練習回数ランキング</span>
    </div>
    <div class="col-2 p-1 rounded purple-gradient d-flex align-items-center justify-content-center font-weight-bold text-white">
      <span class="font-weight-bold text-white">{{ date('m') }}月</span>
    </div>
  </div>
  <div class="card-body user-ranking-list py-3">
    @foreach ($ranked_users as $ranked_user)
    <div class="d-flex">
      <p class="ranking-icon{{ $ranked_user->rank }} mr-3">
        {{ $ranked_user->rank }}
      </p>
      <a href="{{ route('users.show', ['name' => $ranked_user->name]) }}" class="mr-1">
        <img src="{{ $ranked_user->profile_image }}" class="user-mini-icon rounded-circle mr-2">
        {{ $ranked_user->name }}さん
      </a>
      <p class="h5 ml-auto">{{ $ranked_user->achievement_days_count }}回</p>
    </div>
    @endforeach
  </div>
</div> -->