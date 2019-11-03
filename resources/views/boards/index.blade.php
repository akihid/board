@extends('layouts.common')
@section('content')

  <div class="row">
    <div class="search-wrapper col-md-6">
      <form class="search-box" action="{{ route('boards.index') }}" method="GET">
        <div class="form-group">
          <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="タイトルを入力してください">
        </div>
        <div class="btn-group">
          <input type="submit" value="検索" class="btn btn-primary">
          <a href="{{ route('boards.index') }}"  method="GET" class="btn btn-secondary">クリア</a>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
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
</div>
@endsection