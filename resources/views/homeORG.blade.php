<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laravel API</title>
</head>
<body class="container-fluid">

<div id="app">
    <front-page></front-page>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>