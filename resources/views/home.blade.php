@extends('layouts.common')
@section('content')

@if(!Auth::check())
<div class="top-wrapper">
  <div class="top-box mx-auto pt-5 pb-5">
    <h1 class="text-center"><b>Hello Hackers！</b></h1>
    <p class="text-center">このサイトは、Qiitaを意識して作成したサイトです。<br>マークダウンおよびコードのハイライト表示に対応しています。</p>
    <a class="text-center" href="https://github.com/akihid/board">GitHub</a>
  </div>
</div>
@else
@endif

@endsection