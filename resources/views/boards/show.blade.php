@extends('layouts.common')
@section('content')

<div class="item-page-wrapper">
  <div class="item-wrapper">
    <div class="item-header d-flex align-items-center">
      <span class="date">{{$board->created_at}}</span>
      <span>投稿者: <a class="text-primary" href="{{ route('users.show', ['user'=>$board->user]) }}">{{$board->user->name}}</a></span>
      @if ($board->user_id == Auth::id())
        <div class="btn-group">
          <a class="btn btn-primary btn-sm" href="{{ route('boards.edit', ['board'=>$board]) }}">修正する</a>
          <form method="post" action="{{ route('boards.destroy', ['board'=>$board]) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
          </form>
        </div>
      @endif

      @if ($like)
        <form method="post" action="{{ route('likes.destroy', ['like'=>$like]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm ml-3"><i class="fas fa-thumbs-up fa-fw"></i>いいね済み！{{ $board->likes->count()}}</button>
        </form>
      @else
        <form method="POST" action="{{ route('likes.store') }}">
          @csrf

          <input name="board_id" type="hidden" value="{{ $board->id }}">
          <input name="user_id" type="hidden"  value="{{ Auth::id() }}">
          <button type="submit" class="btn btn-primary btn-sm ml-3"><i class="fas fa-thumbs-up fa-fw"></i>いいね！{{ $board->likes->count()}}</button>
        </form>
      @endif

    </div>
    <div class="item-title">{{$board->title}}</div>
    <div class="item-body">{{$board->body}}</div>
  </div>

  <div class="comment-wrapper">
    <h5 class="mb-4">コメント</h5>
    @include('errors.form_errors')

    @forelse($board->comments as $comment)
      <div class="comment-main border-top">
        <div class="comment-body">{!!  nl2br($comment->body) !!}</div>
        <div class="comment-footer">
          <span>投稿者: <a class="text-primary" href="{{ route('users.show', ['user'=>$comment->user]) }}">{{$comment->user->name}}</a></span>
          <span class="date">{{$comment->created_at}}</span>
          @if ($comment->user_id == Auth::id())
            <form method="post" action="{{ route('comments.destroy', ['comment'=>$comment]) }}">
              @csrf
              @method('DELETE')
              <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
            </form>
          @endif
        </div>
      </div>
    @empty
      <p>コメントはまだありません。</p>
    @endforelse

    <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
      @csrf

      <input name="board_id" type="hidden" value="{{ $board->id }}">
      <input name="user_id" type="hidden"  value="{{ Auth::id() }}">

      <div class="form-group">
        <label for="body">本文</label>
        <textarea id="body" name="body" class="form-control" rows="4">{{ old('body') }}</textarea>
      </div>

      <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary">コメントする</button>
      </div>
    </form>
  </div>
</div>

@endsection