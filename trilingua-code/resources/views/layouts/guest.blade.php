<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'TriLingua')</title>
        @vite(['resources/css/base.css', 'resources/css/layouts/guest.css', 'resources/js/app.js'])
        @yield('styles')
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="auth-body">
    <div class="auth-container">
        <div class="auth-card">
            @yield('content')
        </div>
    </div>
</body>
</html>
