@extends('layouts.common')
@section('content')

@include('errors.form_errors')

<form class="board-page-wrapper" action="{{ route('boards.store') }}" method="POST">
  @csrf
  @include('boards._form', ['title' => '','body' => '', 'submitBtn' => '投稿'])
</form>

@endsection