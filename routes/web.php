<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\TweetController;
Route::get('/', function () {
    return view('index');
});
//user signup  and login route written here..................................................................
Route::get('/login', function () { return view('login');})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/signup', function () {return view('signup');})->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('register');
//user signup and login route end here#######################################################################

Route::get('/password/request', function () {
    return view('auth.passwords.email'); // Assuming you have a view for password reset request
})->name('password.request');

//dashbord related route will here.
Route::get('/dashboard', [DashboardController::class,'verifyDashboard'])->name('dashboard');

//Tweet related route will here.........
Route::get('/home', [TweetController::class, 'home'])->name('home');
Route::get('/tweet',[TweetController::class,'tweet'])->name('tweet');
Route::post('/tweetsave',[TweetController::class,'tweetsave'])->name('tweetsave');
Route::post('/retweetsave',[TweetController::class,'retweetsave'])->name('retweetsave');
Route::post('/like-tweet', [TweetController::class, 'likeTweet'])->name('likeTweet');

//profile edit related route
Route::get('/profile/edit', [EditProfileController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update', [EditProfileController::class, 'updateProfile'])->name('profile.update');