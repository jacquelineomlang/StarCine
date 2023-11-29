<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinema</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("/images/4.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            filter: blur(4px); /* Adjust the blur intensity as desired */
            z-index: -1;
        }

        .navbar {
            background-color: #C4DBE0;
            opacity: 0.5;
            padding: 9px;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .nav-links {
            display: flex;
            align-items: center;
            margin-left: 1000px; /* Added margin to move the links to the left */
        }

        .navbar .nav-links a {
            padding: 20px;
            margin: 0 5px;
            color: #333;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .navbar .nav-links a:hover {
            background-color: #FFA7B9;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 80px); /* Adjusted container height to fit the logo within the viewport */
            padding: 5px;
        }

        .logo {
            max-height: 400px;
            max-width: 600px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="nav-links">
            @if (Route::has('login'))
                @auth
                    <a href="/client">Home</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <div class="container">
        <img src="/images/3.png" alt="Logo" class="logo">
    </div>
</body>
</html>
