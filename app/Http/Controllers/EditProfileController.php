<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\Tweet;
use App\Models\Retweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EditProfileController extends Controller
{
    //
    public function editProfile()
{
    if (Auth::check()) {
    return view('edit', ['user' => Auth::user()]);
    }
    else{
        return view('login');
    }
}

public function updateProfile(Request $request)
{
    if (Auth::check()) {
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
        'bio' => 'nullable|string',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $newUsername = $request->username;

   
    if ($newUsername !== Auth::user()->username) {
      
        $existingUser = userModel::where('username', $newUsername)->first();

        if ($existingUser) {
           
            return redirect()->back()->withErrors(['username' => 'The username has already been taken.'])->withInput();
        }
    }

    // Update user information
    $user = Auth::user();
    $user->name = $request->name;
    $user->username = $newUsername; 
    $user->bio = $request->bio;

    if ($request->hasFile('profile_image')) {
        
        if ($user->profile_image) {
            Storage::delete('public/profile_images/' . $user->profile_image);
        }

        $path = $request->file('profile_image')->store('public/profile_images');
        $user->profile_image = basename($path);
    }

    $user->save();

    return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
}
else{
    return view('login');
}
}



}
