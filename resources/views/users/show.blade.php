@extends('layouts.common')
@section('content')

<div class="user-page-wrapper">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{$user->name}}のユーザーページ</div>
        <div class="user-info-wrapper">
          <div class="user-info-box-left">
            @isset ($user->avator_url)
              <img class="avator_img_def" src="{{ $user->avator_url }}" alt="アバター画像">
            @else
              <img class="avator_img_def" src="/images/default.jpeg" alt="アバター画像">
            @endisset
          </div>
          <div class="user-info-box-right">
            <div class="user-detail">{!!  nl2br($user->detail) !!}</div>
            @if ($user->id == Auth::id())
              <a class="btn btn-primary btn-sm d-block mx-auto" href="{{ route('users.edit', ['user'=>$user]) }}">ユーザー情報の更新</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="user-board-wrapper col-md-3">
      <div class="card">
        <div class="card-header">投稿一覧(最新5件)</div>
        @forelse ($boards as $board)
          @include('boards._board_index', ['board' => $board])
        @empty
          <p>まだ投稿をしていません。</p>
        @endforelse
      </div>
    </div>
    <div class="user-board-wrapper col-md-3">
      <div class="card">
        <div class="card-header">いいね一覧(最新5件)</div>
        @forelse ($likes as $like)
          @include('boards._board_index', ['board' => $like->board])
        @empty
          <p>まだいいねをしていません。</p>
        @endforelse
      </div>
    </div>
    <div class="user-board-wrapper col-md-3">
      <div class="card">
        <div class="card-header">コメント一覧(最新5件)</div>
          @forelse ($comments as $comment)
            @include('boards._board_index', ['board' => $comment->board])
          @empty
            <p>まだコメントをしていません。</p>
          @endforelse
      </div>
    </div>
  </div>

</div>

@endsection