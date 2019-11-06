<div class="board-box">
  <div class="board-box-left">
    <a href="{{ route('users.show', ['user'=>$board->user]) }}">
      @isset ($board->user->avator_url)
        <img class="avator_img_min" src="{{ $board->user->avator_url }}" alt="アバター画像">
      @else
        <img class="avator_img_min" src="/images/default.jpeg" alt="アバター画像">
      @endisset
    </a>
  </div>
  <div class="board-box-right">
    <a href="{{ route('boards.show', ['board'=>$board]) }}">
      <span class="board-title">{{ $board->title }}</span>
      <div class="board-details">
        <div class="board-date">投稿日時：{{ $board->created_at }}</div>
      </div>
    </a>
  </div>
</div>