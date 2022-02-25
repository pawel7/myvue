<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    <title>Vue Front End For A Laravel API</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="/js/app.js"></script>
</head>
<body class="container-fluid">
<div id="app">
    <navbar></navbar>
</div>
</body>
</html>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>Send form data with vue js in laravel</title>
</head>
<body>
     
    <div id="app">
    <div class="py-4">
        @yield('content')
    </div>
     
    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html> 