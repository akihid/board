@extends('layouts.common')
@section('content')

@include('errors.form_errors')

<form class="board-page-wrapper" action="{{ route('boards.update', ['board' => $board]) }}" method="POST">
  @csrf
  @method('PATCH')
  <div class="form-group row">
    <input type="text" class="form-control col-md-10 m-1" id="title-input" name="title" value="{{ old('title', $board->title) }}">
  </div>
  <div class="row">
    <div class="markdown_field col-md-5 m-1">
      <div class="form-group">
        <textarea name="body" id="markdown_editor_textarea" cols="30" rows="10" class="form-control">{{ old('body', $board->body) }}</textarea>
      </div>
    </div>
    <div class="markdown_field col-md-5 m-1">
      <div id="markdown_preview"></div>
    </div>
  </div>
  <div class="row">
    <div class="board-page-footer col-md-10">
      <input type="submit" class="post-button m-1" value="修正">
    </div>
  </div>
</form>

@endsection