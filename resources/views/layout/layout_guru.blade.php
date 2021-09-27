<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body class="" id="body">
    <div class="min-h-screen flex flex-col justify-between bg-ocean-light dark:bg-ocean-dark dark:text-white bg-opacity-50">
        @yield('navbar')
        @yield('content')
        @yield('footer')
    </div>
</body>
</html>
