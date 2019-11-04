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
                <img class="avator_img_def" src="{{ asset('/storage/avator_images/'.$user->avator_url) }}" alt="アバター画像">
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

  <div class="row">
    <div class="user-board-wrapper col-md-5">
      <h1>投稿一覧</h1>
      @include('boards._index', ['boards' => $boards])
    </div>
    <div class="user-board-wrapper col-md-5">
      <h1>いいね一覧</h1>
      @foreach ($likes as $like)
        <a href="{{ route('boards.show', ['board'=>$like->board]) }}">
          <div class="board-box">
            <div class="board-box-left"></div>
            <div class="board-box-right">
              <span class="board-title">{{ $like->board->title }}</span>
              <div class="board-details">
                <div class="board-date">投稿日時：{{ $like->board->created_at }}</div>
              </div>
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>

</div>

@endsection