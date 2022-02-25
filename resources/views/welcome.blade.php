<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    <title>Vue Front End For A Laravel API - Send form data with Vue.js</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="/js/app.js"></script>
    <!--script src="{{ mix('js/app.js') }}" defer></script-->
</head>
<body class="container-fluid">
<div id="app">
    <navbar></navbar>
    <div class="py-4">
        @yield('content')
    </div>
</div>
</body>
</html>