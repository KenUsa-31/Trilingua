@extends('layouts.guest')

@section('title','Reset Password')

@section('styles')
    @vite(['resources/css/views/auth/login.css'])
@endsection

@section('content')
    {{-- Heading --}}
    <div class="auth-header">
        <h1>Reset password</h1>
        <p class="auth-subtitle">Enter your new password below.</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('password.update') }}" class="auth-form">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="form-field">
            <label for="email">Email address</label>
            <input id="email" type="email" value="{{ $email }}" disabled class="input-disabled" />
        </div>

        <div class="form-field">
            <label for="password">New Password</label>
            <input id="password" name="password" type="password" placeholder="••••••••" required autocomplete="new-password" />
            @error('password') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <div class="form-field">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" required autocomplete="new-password" />
        </div>

        <button type="submit" class="btn-auth">Reset password</button>

        <p class="auth-footer">
            <a href="{{ route('login') }}" class="link-bold">← Back to login</a>
        </p>
    </form>
@endsection
