@extends('layouts.common')
@section('content')

<div class="user-page-wrapper">
  <div class="user-info-wrapper">
    <span class="user-name">投稿者: {{$user->name}}</span>
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