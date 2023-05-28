@extends('layouts.layoutlogin')
@section('title')
    login
@endsection
@section('form')
<form method="POST" action="{{ route('login') }}">
    @csrf
    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <div>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
    </div>

    <div>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required autocomplete="current-password" />
    </div>

    <div>
        <label for="remember_me">
            <input id="remember_me" type="checkbox" name="remember" />
            <span>Remember me</span>
        </label>
    </div>

    <div>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        @endif

        <button type="submit">Log in</button>
    </div>
</form>
@endsection
