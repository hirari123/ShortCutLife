<!-- ユーザーページのプロフィール部分 -->

<div class="card my-5">
  <div class="card-body">
    <div class="d-flex flex-row row">
      
      <div class="col-3 text-center">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
          <i class="fas fa-user-circle fa-8x"></i>
        </a>
      </div>

      <div class="col-9">
        <div class="row mb-2">
          <div class="col-5">
            <h2 class="h5 card-title pt-3 font-weight-bold">
              <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                {{ $user->name }}
              </a>
            </h2>

          </div>

          <div class="col-7 row">
            <div class="col-5 text-center pr-0">
              @if (Auth::id() !== $user->id)
                <follow-button
                  class="ml-auto"
                  :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                  :authorized='@json(Auth::check())'
                  endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                >
                </follow-button>
              @else
              <a href="{{ route('users.edit', ['name' => Auth::user()->name]) }}" class="btn btn-default d-block d-flex justify-content-center align-items-center rounded h-100 m-0 p-1 text-white">
                プロフィール<br>編集
              </a>
              @endif
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="card-body">
    <div class="card-text">
      <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followings }}フォロー
      </a>
      <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followers }}フォロワー
      </a>
    </div>
  </div>
</div>