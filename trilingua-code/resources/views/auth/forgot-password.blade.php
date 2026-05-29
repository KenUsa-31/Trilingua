@extends('layouts.guest')

@section('title','Forgot Password')

@section('styles')
    @vite(['resources/css/views/auth/login.css'])
@endsection

@section('content')
    {{-- Heading --}}
    <div class="auth-header">
        <h1>Forgot password?</h1>
        <p class="auth-subtitle">No worries, we'll send you reset instructions.</p>
    </div>

    {{-- Success Message --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('password.email') }}" class="auth-form">
        @csrf

        <div class="form-field">
            <label for="email">Email address</label>
            <input id="email" name="email" value="{{ old('email') }}" type="email" placeholder="you@example.com" required autofocus autocomplete="email" />
            @error('email') <p class="error-message">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn-auth">Send reset link</button>

        <p class="auth-footer">
            <a href="{{ route('login') }}" class="link-bold">← Back to login</a>
        </p>
    </form>
@endsection
