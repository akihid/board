<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Board</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="https://raw.githubusercontent.com/simonlc/Markdown-CSS/master/markdown.css" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}"></script>
    </head>
    <body>
        @include('layouts.navbar')
        <main class="py-4">
          @yield('content')
        </main>
    </body>
</html>