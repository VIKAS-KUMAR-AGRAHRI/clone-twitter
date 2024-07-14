@extends('layout');

@section('content');
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter Clone</title>
    <link rel="stylesheet" href="{{ asset('css/second.css') }}">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <div class="item">
                <img src="{{ asset('images/search.png') }}" alt="Search Icon" class="icon">
                <span>Follow your interests.</span>
            </div>
            <div class="item">
                <img src="{{ asset('images/people.png') }}" alt="People Icon" class="icon">
                <span>Hear what people are talking about.</span>
            </div>
            <div class="item">
                <img src="{{ asset('images/chat.png') }}" alt="Conversation Icon" class="icon">
                <span>Join the conversation.</span>
            </div>
        </div>
        <div class="right-panel">
            <img src="{{ asset('images/twitter-logo.png') }}" alt="Twitter Bird Icon" class="twitter-icon">
            <h1>See what's happening in the world right now</h1>
            <p>Join Twitter today.</p>
            <a href="{{route('signup')}}" class="signup-btn">Sign Up</a>
            <a href="{{route('login')}}" class="login-btn">Log in</a>
        </div>
    </div>
</body>
</html>
@endsection