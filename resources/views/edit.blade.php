@extends('layout')

@section('content')
@include('nav')

<div style="width: 60%; margin:auto;">
    <div class="container">
        <div class="goto-dashboard" style="margin-bottom: 20px;">
            <a href="{{ route('dashboard') }}" style="text-decoration: none; color: #1DA1F2; font-weight: bold;">Go to Dashboard</a>
        </div>
        <h1 style="margin-bottom: 20px;">Edit Profile</h1>

        @if(session('success'))
            <div class="alert alert-success" style="padding: 10px; background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; color: #155724; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" style="padding: 10px; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: 5px; color: #721c24; margin-bottom: 20px;">
                <ul style="margin-bottom: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="name" style="font-weight: bold;">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" style="padding: 10px; border: 1px solid #e1e8ed; border-radius: 5px; width: 100%;" required>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="username" style="font-weight: bold;">Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" style="padding: 10px; border: 1px solid #e1e8ed; border-radius: 5px; width: 100%;" required>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="bio" style="font-weight: bold;">Bio</label>
                <textarea name="bio" class="form-control" style="padding: 10px; border: 1px solid #e1e8ed; border-radius: 5px; width: 100%; resize: vertical;">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="profile_image" style="font-weight: bold; display: block;">Profile Image</label>
                <div style="margin-top: 5px;">
                    <input type="file" name="profile_image" class="form-control">
                </div>
                @if($user->profile_image)
                    <div style="margin-top: 10px;">
                        <img src="{{ asset('storage/profile_images/'. $user->profile_image) }}" alt="Profile Image" class="img-thumbnail" style="max-width: 150px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary" style="padding: 10px 20px; background-color: #1DA1F2; color: white; border: none; border-radius: 5px; cursor: pointer;">Update Profile</button>
        </form>
    </div>
</div>
@endsection
