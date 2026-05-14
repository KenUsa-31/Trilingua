<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'TriLingua') — TriLingua</title>
    @vite(['resources/css/base.css', 'resources/css/layouts/guest.css', 'resources/js/app.js'])
    @yield('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="auth-body">
<div class="auth-container">

    {{-- Left branding panel --}}
    <div class="auth-brand">
        <div class="auth-brand__logo">
            <div class="auth-brand__logo-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.87 15.07l-2.54-2.51.03-.03A17.52 17.52 0 0 0 14.07 6H17V4h-7V2H8v2H1v2h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z" fill="white"/>
                </svg>
            </div>
            <span class="auth-brand__logo-name">TriLingua</span>
        </div>

        <div class="auth-brand__tagline">
            <h2>Translate across<br>three languages</h2>
            <p>Powered by NLLB-200 AI — translate text and documents between English, Cebuano, and Filipino instantly.</p>

            <div class="auth-brand__langs">
                <span class="auth-brand__lang-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    English
                </span>
                <span class="auth-brand__lang-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    Cebuano
                </span>
                <span class="auth-brand__lang-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    Filipino
                </span>
            </div>
        </div>
    </div>

    {{-- Right form panel --}}
    <div class="auth-card">
        <div class="auth-card-inner">
            @yield('content')
        </div>
    </div>

</div>
</body>
</html>
