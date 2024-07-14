@extends('layout')

@section('content')
@include('nav')

@php
    
    $date = new DateTime(Auth::user()->created_at);
    $formattedDate = $date->format('F Y');
@endphp

<div class="header">
    <img src="{{ asset('images/header-bg.jpg') }}" alt="Header Background" class="header-bg">
    <img src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="User Avatar" class="user-avatar">
    <div class="user-info">
        <div class="user-info-grid">
            <div>
                <div>Tweets</div>
                <div>{{ $userTweetCount }}</div>
            </div>
            <div>
                <div>Lists</div>
                <div>1</div>
            </div>
            <div>
                <div>Moments</div>
                <div>1</div>
            </div>
        </div>
    </div>
    <a href="{{ route('profile.edit') }}" class="edit-profile-btn">Edit Profile</a>
</div>

<div class="main-content">
    <div class="sidebar-left">
        <div class="user-stats">
            <h1>{{ Auth::user()->name }}</h1><br>
            <div>{{ Auth::user()->username }}</div>
            <div>Joined {{ $formattedDate }}</div>
        </div>
    </div>

    <div class="tweets-section">
        <h2>Tweets and Retweets</h2>
        @foreach ($allTweets as $tweet)
            <div class="tweet">
                <img src="{{ asset('storage/profile_images/' . $tweet->user->profile_image) }}" alt="User Avatar" class="tweet-avatar">
                <div class="tweet-content">

                    <p><strong>{{ $tweet->user->name }}</strong> {{ $tweet->user->username }} @if ($tweet->user->name != Auth::user()->name)
                        @ Retweeted
                    @endif</p>
                    
                    <p>{{ $tweet->content }}</p>
                    
                    <!-- Media display -->
                    @if ($tweet->media)
                        @if (in_array(pathinfo($tweet->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'svg']))
                            <img src="{{ Storage::url($tweet->media) }}" alt="Tweet Media" class="tweet-media">
                        @else
                            <video controls class="tweet-media">
                                <source src="{{ Storage::url($tweet->media) }}" type="video/{{ pathinfo($tweet->media, PATHINFO_EXTENSION) }}">
                            </video>
                        @endif
                    @endif

                    <div class="tweet-actions">
                        <span>Reply</span>
                        <span>Like {{ $tweet->likes()->count() }}</span>
                        <span>Share</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="sidebar-right">
        <h3>Who to follow</h3>
        <div class="suggested-user-list">
            @foreach ($usersToFollow as $user)
                <div class="suggested-user">
                    <img src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="Suggested User Avatar" class="suggested-avatar">
                    <div class="user-details">
                        <p>{{ $user->name }}</p>
                        
                        <button class="follow-btn">Follow</button>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="#">Refresh</a>
        <a href="#">View all</a>
    </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>
@endsection
