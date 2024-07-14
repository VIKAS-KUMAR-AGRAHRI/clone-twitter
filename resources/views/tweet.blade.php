<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweet Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f8fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border: 1px solid #e1e8ed;
            border-radius: 10px;
            padding: 20px;
            width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .tweet-form {
            display: flex;
            flex-direction: column;
        }

        .tweet-form textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #e1e8ed;
            border-radius: 5px;
            resize: none;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .tweet-form input[type="file"] {
            margin-bottom: 10px;
        }

        .tweet-form button {
            padding: 10px;
            background-color: #1da1f2;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .tweet-form button:hover {
            background-color: #0d8ddb;
        }

        .success-message {
            margin-top: 10px;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 5px;
        }

        .goto-dashboard {
            text-align: center;
            margin-top: 10px;
        }

        .goto-dashboard a {
            text-decoration: none;
            color: #1da1f2;
            font-weight: bold;
        }

        .goto-dashboard a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Tweet</h2>

        <!-- Display success message if it exists -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('tweetsave') }}" class="tweet-form" enctype="multipart/form-data">
            @csrf
            <textarea placeholder="What's happening?" name="content"></textarea>
            <input type="file" name="media" accept="image/*,video/*">
            <button type="submit">Tweet</button>
        </form>

        <!-- Go to Dashboard button -->
        <div class="goto-dashboard">
            <a href="{{ route('dashboard') }}">Go to Dashboard</a>
        </div>
    </div>
</body>
</html>
