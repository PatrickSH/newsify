<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Newsify</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/newsify/app/public/css/app.css?ver={{rand(1,1000)}}">
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
        <script src="/newsify/app/public/js/app.js?ver={{rand(1,1000)}}"></script>
    </body>
</html>
