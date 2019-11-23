@if ($like)
  <form method="post" action="{{ route('likes.destroy', ['like'=>$like]) }}">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger btn-sm ml-3 small"><i class="fas fa-thumbs-up fa-fw"></i>いいね済み！{{ $board->likes->count()}}</button>
  </form>
@else
  <form method="POST" action="{{ route('likes.store') }}">
    @csrf

    <input name="board_id" type="hidden" value="{{ $board->id }}">
    <input name="user_id" type="hidden"  value="{{ Auth::id() }}">
    <button type="submit" class="btn btn-primary btn-sm ml-3 small"><i class="fas fa-thumbs-up fa-fw"></i>いいね！{{ $board->likes->count()}}</button>
  </form>
@endif