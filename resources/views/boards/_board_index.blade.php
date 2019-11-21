<div class="board-box">
  <div class="board-box-left">
    <a href="{{ route('users.show', ['user'=>$board->user]) }}">
      @include('users._user_avator_url', ['user' => $board->user])
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