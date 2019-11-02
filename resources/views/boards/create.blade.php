@extends('layouts.common')
@section('content')

@if ($errors->any())
  <ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form class="board-page-wrapper" action="/boards" method="post">
@csrf
  <input type="text" class="form-control m-1" id="title-input" placeholder="タイトル" name="title">
  <div class="row">
    <div class="col-6 m-1">
      <textarea name="body" id="markdown_editor_textarea" cols="30" rows="10" class="form-control"></textarea>
    </div>
  </div>
  <div class="board-page-footer">
    <input type="submit" class="post-button m-1" value="投稿">
  </div>
</form>

@endsection