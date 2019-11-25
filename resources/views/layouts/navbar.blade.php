<nav class="navbar navbar-expand-md navbar-light">
  <a class="navbar-brand text-white" href="/">Board</a>

  <form class="form" action="{{ route('boards.index') }}" method="GET">
    @csrf
    <input type="text" name="keyword" class="form-control" placeholder="キーワードを入力">
  </form>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbar">
      <ul class="navbar-nav">
        @guest
          <!-- 非ログイン時 -->
          <li class="nav-item">
            <a class="nav-link text-white text-center" href="{{ route('login') }}">ログイン</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white text-center" href="{{ route('register') }}">登録</a>
          </li>
        @else
        <!-- ログイン時 -->
        <li class="nav-item">
          <a class="nav-link text-white text-center" href="{{ route('boards.index') }}">投稿一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white text-center" id="post-link" href="{{ route('boards.create') }}">投稿する</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white text-center" href="{{ route('maps.index') }}"><i class="fas fa-mug-hot fa-fw"></i>近場のカフェ表示</a>
        </li>
        <!-- ドロップダウンメニュー -->
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item text-center" href="{{ route('users.show', ['user'=>Auth::user()]) }}">マイページ</a>
            <a class="dropdown-item text-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              ログアウト
            </a>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      @endguest
    </div>
</nav>