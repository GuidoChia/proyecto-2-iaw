<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Import jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
            crossorigin="anonymous">
    </script>

    <!-- Latest bootstrap compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Latest bootstrap compiled JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet"/>


</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">

        @auth
        <a href="{{ url('/home') }}">
            <button type="button" class="btn btn-primary">Home</button>
        </a>
        <a href="{{ url('/search') }}">
            <button type="button" class="btn btn-primary">Search</button>
        </a>
        <a href="{{ url('/upload-stock') }}">
            <button type="button" class="btn btn-primary">Upload</button>
        </a>
        @else
        <a href="{{ route('login') }}">
            <button type="button" class="btn btn-secondary">Login</button>
        </a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">
            <button type=" button" class="btn btn-secondary">Register</button>
        </a>

        @endif
        @endauth
    </div>
    @endif
    <div class="jumbotron">
        <div class="content">
            <div class="title m-b-md">
                Laboratorio de Análisis Clínicos
            </div>
        </div>
    </div>
</div>
</body>
</html>
