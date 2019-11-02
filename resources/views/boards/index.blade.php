@extends('layouts.common')
@section('content')
  <h1>投稿一覧</h1>
  <div class="boardss-wrapper col-md-6">
    @foreach ($boards as $board)
    <div class="board-box">
      <div class="board-box-left">
        <a class="btn btn-primary" href="{{ route('boards.edit', ['board'=>$board]) }}">修正する</a>
        <form method="post" action="{{ route('boards.destroy', ['board'=>$board]) }}">
          @csrf
          @method('DELETE')
          <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
        </form>
      </div>
      <div class="board-box-right">
        <a class="board-title" href="#">{{ $board->title }}</a>
        <div class="board-details">
          <div class="board-date">{{ $board->created_at }}</div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection