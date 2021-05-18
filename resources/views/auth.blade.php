<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Track - Login</title>

        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    </head>

    <body class="gradient-bg h-screen overflow-hidden">

        <div id="app" class="font-sans text-orange-lightest h-full overflow-hidden">

            <div class="container max-w-full flex flex-col h-full overflow-hidden">


                @yield('content')

            </div>

        </div>

        <script src="/js/app.js"></script>

    </body>

</html>
