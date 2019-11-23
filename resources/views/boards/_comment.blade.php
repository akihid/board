<div class="comment-wrapper m-4 p-2">
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

  @auth
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
  @endauth
</div>