@extends('layouts.common')
@section('content')

@if ($errors->any())
  <ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif


<form class="mt-5" action="{{ route('boards.update', ['board' => $board]) }}" method="POST">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <input type="text" class="form-control m-1" id="title-input" name="title" value="{{ old('title', $board->title) }}">
  </div>
  <div class="form-group">
    <textarea name="body" id="markdown_editor_textarea" cols="30" rows="10" class="form-control">{{ old('body', $board->body) }}</textarea>
  </div>
  <div class="board-page-footer">
    <input type="submit" class="post-button m-1" value="修正">
  </div>
</form>

@endsection