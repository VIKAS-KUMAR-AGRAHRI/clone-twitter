<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="navbar">
    <div class="navbar-left">
        <a href="{{route('home')}}">Home</a>
        <a href="{{route('home')}}">Moments</a>
        <a href="{{route('home')}}">Notifications</a>
        <a href="{{route('home')}}">Messages</a>
    </div>
    <div class="navbar-center">
        <img src="{{ asset('images/twitter-logo.png') }}" alt="Twitter Logo" class="logo">
    </div>
    <div class="navbar-right">
        <input type="text" placeholder="Search Twitter">
   
        <a href="{{route('dashboard')}}"><img src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="User Avatar" class="avatar"></a>

        <a href="{{route('tweet')}}" class="tweet-btn">tweet</a>
        <a href="{{route('logout')}}" class="tweet-btn">Logout</a>
        
    </div>
</div>
