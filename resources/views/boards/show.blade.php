@extends('layouts.common')
@section('content')

<div class="item-page-wrapper">
  <div class="item-wrapper">
    <div class="item-header">
      <div class="date">{{$board->created_at}}</div>
      <a class="btn btn-primary" href="{{ route('boards.edit', ['board'=>$board]) }}">修正する</a>
      <form method="post" action="{{ route('boards.destroy', ['board'=>$board]) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
      </form>
    </div>
    <div class="item-title">{{$board->title}}</div>
    <div class="item-body">{{$board->body}}</div>
  </div>
</div>

@endsection