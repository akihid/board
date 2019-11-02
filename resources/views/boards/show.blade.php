@extends('layouts.common')
@section('content')

<div class="item-page-wrapper">
  <div class="item-wrapper">
    <div class="item-header">
      <span class="date">{{$board->created_at}}</span>
      <div class="btn-group">
        <a class="btn btn-primary btn-sm" href="{{ route('boards.edit', ['board'=>$board]) }}">修正する</a>
        <form method="post" action="{{ route('boards.destroy', ['board'=>$board]) }}">
          @csrf
          @method('DELETE')
          <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
        </form>
      </div>
    </div>
    <div class="item-title">{{$board->title}}</div>
    <div class="item-body">{{$board->body}}</div>
  </div>
</div>

@endsection