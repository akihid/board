@extends('layouts.common')
@section('content')

  <div class="row">
    <div class="search-wrapper col-md-6 mb-3">
      <form class="search-box" action="{{ route('boards.index') }}" method="GET">
        @csrf
        <div class="btn-group w-75">
          <input type="text" name="keyword" value="{{empty($keyword) ? null : $keyword}}" class="form-control" id="search_title_text" placeholder="タイトルを入力してください">
          <i class="d-none searchclear fas fa-times fa-fw"></i>
        </div>
          <button type="submit" class="btn btn-primary"><i class="fas fa-search fa-fw"></i>検索</button>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="boards-wrapper col-md-6">
      <h1>投稿一覧</h1>
      @forelse ($boards as $board)
        @include('boards._board_index', ['board' => $board])
      @empty
        <p class="text-center">まだ投稿をしていません。</p>
      @endforelse
      {{ $boards->links() }}
    </div>
  </div>
</div>
@endsection