@extends('layouts.common')
@section('content')

<div class="user-page-wrapper">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-12">
      <div class="card">
        <div class="card-header">{{$user->name}}のユーザーページ</div>
        <div class="user-info-wrapper">
          <div class="user-info-box-left">
            @include('users._user_avator_url', ['user' => $user])
          </div>
          <div class="user-info-box-right">
            <div class="user-detail">{!!  nl2br($user->detail) !!}</div>
            @if ($user->id == Auth::id())
              <div class="text-right"><a class="btn btn-outline-info btn-sm pull-right" href="{{ route('users.edit', ['user'=>$user]) }}"><i class="fas fa-user-edit fa-fw"></i>ユーザー情報の更新</a></div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="m-3 col-lg-3 col-md-12">
      <div class="card">
        <div class="card-header">投稿一覧(最新5件)</div>
        @forelse ($boards as $board)
          @include('boards._board_index', ['board' => $board])
        @empty
          <p>まだ投稿をしていません。</p>
        @endforelse
      </div>
    </div>
    <div class="m-3 col-lg-3 col-md-12">
      <div class="card">
        <div class="card-header">いいね一覧(最新5件)</div>
        @forelse ($likes as $like)
          @include('boards._board_index', ['board' => $like->board])
        @empty
          <p>まだいいねをしていません。</p>
        @endforelse
      </div>
    </div>
    <div class="m-3 col-lg-3 col-md-12">
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