@extends('layouts.common')
@section('content')

<div class="item-page-wrapper">
  @auth
  <div class="container ml-4 pl-2">
    <div class="row">
      @include('boards/_like')
      <span class="btn btn-sm bg-secondary text-white small"><i class="fas fa-comment fa-fw"></i>コメント件数{{ $board->comments->count()}}
    </div>
  </div>
  @endauth
  <div class="item-wrapper m-4 p-2">
    <div class="item-header d-flex align-items-center container m-0 p-0">
      <div class="row w-100">
        <div class="date col-lg-3 col-md-4 col-7 small">
          {{$board->created_at->format('Y年m月d日')}}
          <a class="text-primary" href="{{ route('users.show', ['user'=>$board->user]) }}">{{$board->user->name}}</a>
        </div>

          @if ($board->user_id == Auth::id())
            <div class="btn-group col-lg-2 col-md-3 col-5">
              <a class="btn btn-primary btn-sm" href="{{ route('boards.edit', ['board'=>$board]) }}">修正する</a>
              <form method="post" action="{{ route('boards.destroy', ['board'=>$board]) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
              </form>
            </div>
          @endif
      </div>
      
    </div>
    <div class="item-title">{{$board->title}}</div>
    <div class="item-body">{{$board->body}}</div>
  </div>

  @include('boards/_comment')
</div>

@endsection