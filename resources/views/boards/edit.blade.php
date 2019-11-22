@extends('layouts.common')
@section('content')

@include('errors.form_errors')

<form class="board-page-wrapper" action="{{ route('boards.update', ['board' => $board]) }}" method="POST">
  @csrf
  @method('PATCH')
  @include('boards._form', ['title' => $board->title,'body' => $board->body, 'submitBtn' => '修正'])
</form>

@endsection