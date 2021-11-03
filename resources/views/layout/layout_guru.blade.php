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
    <div class="bg-ocean-light dark:bg-ocean-dark dark:text-ocean-white bg-opacity-50 flex flex-col items-center ">
        <div class="min-h-screen w-full flex flex-col lg:w-5/6">
            <div class="z-20">
                @yield('navbar')
            </div>
            <div class="z-10 flex-grow">
                @yield('content')
            </div>
            <div class="z-10">
                @yield('footer')
            </div>
        </div>
    </div>
</body>
</html>
