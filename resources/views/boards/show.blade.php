@extends('layouts.common')
@section('content')

<div class="item-page-wrapper">
  <div class="item-wrapper">
    <div class="item-header">
      <span class="date">{{$board->created_at}}</span>
      @if ($board->user_id == Auth::id())
        <div class="btn-group">
          <a class="btn btn-primary btn-sm" href="{{ route('boards.edit', ['board'=>$board]) }}">修正する</a>
          <form method="post" action="{{ route('boards.destroy', ['board'=>$board]) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
          </form>
        </div>
      @else
        <span class="user-name">投稿者: {{$board->user->name}}</span>
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
          <span class="comment-user">投稿者:{{$comment->user->name}} </span>
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