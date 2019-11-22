@extends('layouts.common')
@section('content')

@include('errors.form_errors')

<form class="board-page-wrapper" action="{{ route('boards.store') }}" method="POST">
@csrf
  <div class="form-group row">
    <input type="text" class="form-control col-md-10 m-1" id="title-input" placeholder="タイトル" name="title">
  </div>
  <div class="row">
    <div class="markdown_field col-md-5 m-1">
      <textarea name="body" id="markdown_editor_textarea" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="markdown_field col-md-5 m-1">
      <div id="markdown_preview"></div>
    </div>
  </div>
  <div class="row">
    <div class="board-page-footer col-md-10">
      <input type="submit" class="post-button m-1" value="投稿">
    </div>
  </div>
</form>

@endsection