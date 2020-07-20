<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loader-styling.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-brand tag="h1">
                <svgicon icon="icon" width="30" height="26" color="#FFF"></svgicon>
                Welcome
            </b-navbar-brand>
        </b-navbar>
    </div>
    <stock-component>
        <div class="loading">
            <div class="loader"></div>
        </div>
    </stock-component>
</div>
</body>
</html>
