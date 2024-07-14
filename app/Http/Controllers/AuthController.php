<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\Retweet;
use App\Models\Tweet;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        // echo "<pre>";
        // print_r($request->all()); 
        // echo "</pre>";
    }
    
    public function register(Request $request)
    {
          // Validate the request
          $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

       
        // Create a new user
        userModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encrypt the password
        ]);

        // Redirect or return a response
        return redirect()->route('login');
        // echo "<pre>";
        // print_r($request->all()); 
        // echo "</pre>";
    }
    
   
     
    public function logout(Request $request): View
    {
       Auth::logout();
       return view('login');
    }


}
