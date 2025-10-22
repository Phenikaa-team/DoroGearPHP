<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DoroGear - Linh kiện máy tính chính hãng</title>
    @vite('resources/sass/app.scss')
    <style>
        body, html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        main {
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
</head>
<body>
@include('layouts.header')

<main>
    @yield('content')
</main>

@include('layouts.footer')

@vite('resources/js/app.js')
</body>
</html>
