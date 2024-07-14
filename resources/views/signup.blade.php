
@extends('layout')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .signup {
        max-width: 400px;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .signup h1 {
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
        border-bottom: 2px solid #1da1f2;
        box-sizing: border-box;
        transition: border-bottom-color 0.3s ease; 
    }

    .form-group input[type="text"]:focus,
    .form-group input[type="email"]:focus,
    .form-group input[type="password"]:focus {
        outline: none;
        border-bottom-color: #1da1f2; 
    }

    .form-group .error {
        color: red;
        font-size: 12px;
    }

    .form-group button {
        background-color: #1da1f2;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }

    .form-group button:hover {
        background-color: #5eb9c5;
    }
</style>

<div class="signup">
    <h1>Create your account</h1>
    <form id="signupForm" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
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
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="form-group">
            <button type="submit">Signup</button>
        </div>
        <div class="form-group">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
            <a href="{{ route('login') }}">Already account? Sign In</a>
        </div>
    </form>
</div>
@endsection
