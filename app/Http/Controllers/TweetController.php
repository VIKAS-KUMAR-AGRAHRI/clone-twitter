<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\Tweet;
use App\Models\Retweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Like;
class TweetController extends Controller
{
    //
    public function tweet(Request $request): View
    {
        if (Auth::check()) {
            $tweets = Tweet::with('retweets')->get();
            return view('tweet',compact('tweets'));
        } else {
            return view('login');
        }
    }
    public function retweetsave(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'tweet_id' => 'required|exists:tweets,id',
            ]);
    
            // Create a new retweet
            Retweet::create([
                'user_id' => Auth::id(), 
                'tweet_id' => $request->tweet_id, 
            ]);
    
            return redirect()->route('home')->with('success', 'Tweet retweeted successfully!');
        } else {
            return view('login');
        }
    }
    public function tweetsave(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:280', // Adjust the max length as needed
            'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,avi,wmv|max:20480', // 20MB max size
        ]);
    
        // Create a new tweet
        $tweet = new Tweet();
        $tweet->user_id = Auth::id();
        $tweet->content = $request->content;
    
        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('media', 'public');
            $tweet->media = $path;
        }
    
        $tweet->save();
    
        return redirect()->back()->with('success', 'Tweet posted successfully!');
    }
    public function likeTweet(Request $request)
    {
        if (Auth::check()) {
            // Validate request
            $request->validate([
                'tweet_id' => 'required|exists:tweets,id',
            ]);
    
            // Check if the user already liked the tweet
            $existingLike = Like::where('user_id', Auth::id())
                                ->where('tweet_id', $request->tweet_id)
                                ->first();
    
            if ($existingLike) {
                // User already liked, so unlike it
                $existingLike->delete();
                $message = 'Tweet unliked successfully!';
            } else {
                // Like the tweet
                Like::create([
                    'user_id' => Auth::id(),
                    'tweet_id' => $request->tweet_id,
                ]);
                $message = 'Tweet liked successfully!';
            }
    
            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->route('login');
        }
    }
    public function home()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $tweets = Tweet::with('user')->orderBy('created_at', 'desc')->get();
            $usersToFollow  = userModel::where('id', '!=', Auth::id())->get();
        return view('home', compact('user','tweets','usersToFollow'));
            
        } else {
            return view('login');
        }
        
    }
}
