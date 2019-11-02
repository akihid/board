@extends('layouts.common')
@section('content')
  <h1>投稿一覧</h1>
  <div class="boardss-wrapper col-md-6">
    @foreach ($boards as $board)
    <div class="board-box">
      <div class="board-box-left">
      </div>
      <div class="board-box-right">
        <a class="board-title" href="{{ route('boards.show', ['board'=>$board]) }}">{{ $board->title }}</a>
        <div class="board-details">
          <div class="board-date">{{ $board->created_at }}</div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection