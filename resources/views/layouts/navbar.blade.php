<nav class="navbar navbar-expand-lg navbar-light pl-5 pr-5 pt-2 pb-2">
  <a class="navbar-brand text-white" href="/">Board</a>
  <div class="collapse navbar-collapse" id="Navbar">
    <ul class="navbar-nav ml-auto mr-5">
      @guest
        <!-- 非ログイン時 -->
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('login') }}">ログイン</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('register') }}">登録</a>
        </li>
      @else
        <!-- ログイン時 -->
        <li class="nav-item">
          <a class="nav-link text-white" href="#">お気に入り一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" id="post-link" href="{{ route('boards.create') }}">投稿する</a>
        </li>
        <!-- ドロップダウンメニュー -->
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              ログアウト
            </a>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      @endguest
    </ul>
  </div>
</nav>