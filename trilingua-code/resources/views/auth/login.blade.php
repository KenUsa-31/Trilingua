@extends('layouts.guest')

@section('title','Sign in')

@section('styles')
    @vite(['resources/css/views/auth/login.css'])
@endsection

@section('content')
    {{-- Heading --}}
    <div class="auth-header">
        <h1>Welcome back</h1>
        <p class="auth-subtitle">Sign in to your TriLingua account.</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('login.attempt') }}" class="auth-form">
        @csrf

        <div class="form-field">
            <label for="email">Email address</label>
            <input id="email" name="email" value="{{ old('email') }}" type="email" placeholder="you@example.com" required autofocus autocomplete="email" />
            @error('email') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <div class="form-field">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="••••••••" required autocomplete="current-password" />
            @error('password') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <div class="auth-forgot">
            <a href="#" class="link-underline">Forgot password?</a>
        </div>

        <button type="submit" class="btn-auth">Sign in</button>

        <div class="divider-text">or continue with</div>

        <div class="social-buttons">
            <button type="button" class="btn-social" aria-label="Sign in with Google">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 12.24c0-.68-.06-1.34-.17-1.98H12v3.75h4.96c-.21 1.13-.86 2.09-1.83 2.74v2.28h2.96c1.74-1.6 2.74-3.98 2.74-6.79z" fill="#4285F4"/>
                    <path d="M12 22c2.7 0 4.98-.9 6.64-2.44l-2.96-2.28c-.82.55-1.86.88-3.68.88-2.83 0-5.23-1.9-6.09-4.44H1.9v2.79C3.54 19.93 7.48 22 12 22z" fill="#34A853"/>
                    <path d="M5.91 13.72A7.01 7.01 0 015.6 12c0-.72.12-1.41.31-2.06V7.15H1.9A10 10 0 0012 2c2.7 0 4.98.9 6.64 2.44l-2.96 2.28C14.96 6.9 13.92 6.6 12 6.6c-3.3 0-6.11 1.98-7.19 4.86l1.1 2.26z" fill="#FBBC05"/>
                </svg>
            </button>
            <button type="button" class="btn-social" aria-label="Sign in with X">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                </svg>
            </button>
            <button type="button" class="btn-social" aria-label="Sign in with Apple">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09l.01-.01zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/>
                </svg>
            </button>
        </div>

        <p class="auth-footer">
            Not a member? <a href="{{ route('register') }}" class="link-bold">Sign up</a>
        </p>
    </form>
@endsection
