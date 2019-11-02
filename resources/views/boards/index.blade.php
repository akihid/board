@extends('layouts.common')
@section('content')
  <div class="boards-wrapper col-md-6">
    <h1>投稿一覧</h1>
    @foreach ($boards as $board)
      <a href="{{ route('boards.show', ['board'=>$board]) }}">
        <div class="board-box">
          <div class="board-box-left"></div>
          <div class="board-box-right">
            <span class="board-title">{{ $board->title }}</span>
            <div class="board-details">
              <div class="board-date">投稿日時：{{ $board->created_at }}</div>
            </div>
          </div>
        </div>
      </a>
    @endforeach
  </div>
</div>
@endsection