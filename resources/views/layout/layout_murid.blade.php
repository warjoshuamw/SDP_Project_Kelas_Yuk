<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Kelas Yuk</title>
</head>
<body class="" id="body">
    <div class="bg-ocean-light dark:bg-ocean-dark dark:text-white bg-opacity-50 flex flex-col items-center ">
        <div class="min-h-screen  flex flex-col justify-between lg:w-5/6">
            <div class="z-20">
                @yield('navbar')
            </div>
            <div class="z-10">
                @yield('content')
            </div>
            <div class="z-10">
                @yield('footer')
            </div>
        </div>
    </div>
</body>
</html>
