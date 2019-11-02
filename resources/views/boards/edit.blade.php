@extends('layouts.common')
@section('content')

@include('errors.form_errors')

<form class="board-page-wrapper" action="{{ route('boards.update', ['board' => $board]) }}" method="POST">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <input type="text" class="form-control m-1" id="title-input" name="title" value="{{ old('title', $board->title) }}">
  </div>
  <div class="row">
    <div class="col-6 m-1">
      <div class="form-group">
        <textarea name="body" id="markdown_editor_textarea" cols="30" rows="10" class="form-control">{{ old('body', $board->body) }}</textarea>
      </div>
    </div>
    <div class="col-6 m-1">
      <textarea name="preview_body" id="markdown_preview" cols="30" rows="10"></textarea>
    </div>
  </div>
  <div class="board-page-footer">
    <input type="submit" class="post-button m-1" value="修正">
  </div>
</form>

@endsection