<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Board</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/styles/darcula.min.css">
        <script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
        <script src="{{ mix('js/app.js') }}"></script>
    </head>
    <body>
        @include('layouts.navbar')
        <main class="py-4">

          @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
          @endif

          @yield('content')
        </main>
    </body>
</html>