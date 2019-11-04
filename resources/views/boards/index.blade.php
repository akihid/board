@extends('layouts.common')
@section('content')

  <div class="row">
    <div class="search-wrapper col-md-6">
      <form class="search-box" action="{{ route('boards.index') }}" method="GET">
        <div class="form-group">
          <input type="text" name="keyword" value="{{empty($keyword) ? null : $keyword}}" class="form-control" placeholder="タイトルを入力してください">
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
      @include('boards._index', ['boards' => $boards])
    </div>
  </div>
</div>
@endsection