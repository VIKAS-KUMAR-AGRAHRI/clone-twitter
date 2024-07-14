<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\Tweet;
use App\Models\Retweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
class DashboardController extends Controller
{
    //
    public function verifyDashboard(Request $request): View
{
    if (Auth::check()) {
        $user = Auth::user();
        $tweets = Tweet::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $retweets = Retweet::where('user_id', Auth::id())->get();

        $tweetIds = $retweets->pluck('tweet_id');

        $tweetsnew = Tweet::whereIn('id', $tweetIds)->with('retweets')->get();

        $allTweets = $tweets->merge($tweetsnew)->sortByDesc('created_at');

        $usersToFollow  = userModel::where('id', '!=', Auth::id())->get();
        $userTweetCount = $tweets->count();

        return view('dashboard', compact('user', 'allTweets', 'userTweetCount', 'usersToFollow'));
    } else {
        return view('login');
    }
}
}
