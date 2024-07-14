
@extends('layout')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .login {
        max-width: 400px;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login h1 {
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 8px;
        font-size: 16px;
        border: none;
        border-bottom: 1px solid #ccc; 
        box-sizing: border-box;
        transition: border-bottom-color 0.3s ease; 
    }

    .form-group input[type="text"]:focus,
    .form-group input[type="email"]:focus,
    .form-group input[type="password"]:focus {
        outline: none;
        border-bottom-color:  #1da1f2; 
    }

    .form-group .error {
        color: red;
        font-size: 12px;
    }

    .form-group input[type="checkbox"] {
        margin-right: 10px;
    }

    .form-group button {
        background-color:  #1da1f2;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }

    .form-group button:hover {
        background-color: #8ec3e6;
    }

    .form-group a {
        display: block;
        text-align: center;
        margin-top: 10px;
        color: #1da1f2;
        text-decoration: none;
    }

    .form-group a:hover {
        text-decoration: underline;
    }
</style>

<div class="login">
    <h1>Log in to twitter</h1>
    <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="login">Email, Phone, or Username:</label>
            <input type="text" id="login" name="email" value="{{ old('login') }}" required>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember Me</label>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
        <div class="form-group">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
            <a href="{{ route('signup') }}">New to twitter? Sign up</a>
        </div>
    </form>
</div>
@endsection
