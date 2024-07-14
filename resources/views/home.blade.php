@extends('layout')

@section('content')
@include('nav')
<div class="main-content">
    <div class="tweets-section">
        <h2>All Tweets</h2>
        @foreach ($tweets as $tweet)
            <div class="tweet">
                <img src="{{ asset('storage/profile_images/' . $tweet->user->profile_image) }}" alt="User Avatar" class="tweet-avatar">
                <div class="tweet-content">
                    <p><strong>{{ $tweet->user->name }}</strong></p>
                    <p>{{ $tweet->content }}</p>
                    
                
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
                        <form action="{{ route('retweetsave') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                            <button type="submit" style="background:none;border:none;color:rgb(205, 205, 223);cursor:pointer;">Retweet</button>
                        </form>
                        <form action="{{ route('likeTweet') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                            <button type="submit" style="background:none;border:none;color:rgb(149, 149, 165);cursor:pointer;"
                                @if(Auth::id() == $tweet->user_id) disabled @endif>
                                @if ($tweet->likes()->where('user_id', Auth::id())->exists())
                                    Unlike
                                @else
                                    Like
                                @endif
                                {{ $tweet->likes()->count() }}
                            </button>
                        </form>
                        
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
