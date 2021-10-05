@extends('layout.Layout_Login')
@section('main')
    <div class="flex flex-col justify-center content-center items-center">
        <div class="font-serif text-ocean-white text-5xl lg:text-7xl xl:text-9xl my-20 bg-ocean-dark rounded-xl p-2 lg:p-5">
            Kelas Yuk
        </div>
        <div>
            <button class="py-3 px-6 text-white rounded-lg bg-secondary-red hover:bg-secondary-red-hover shadow-lg block md:inline-block">Mulai Disini</button>
        </div>
    </div>
@endsection
@section('background')
<div class="animation">
    <div id="circle1" class="circle -inset-x-1/4 inset-y-1/4  md:inset-1/4 bg-red-500 rounded-full w-96 h-96 absolute transform"></div>
    <div id="circle2" class="circle inset-x-1/4 inset-y-2/4 md:inset-2/4 bg-blue-500 rounded-full w-72 h-72 absolute"></div>
    <div id="circle3" class="circle -inset-x-1/4 inset-y-2/4 md:inset-y-2/4 md:inset-x-1/4  bg-ocean-dark rounded-full w-60 h-60 absolute"></div>
    <div id="circle4" class="circle inset-x-2/4 inset-y-1/4 md:inset-x-2/4 md:inset-y-1/3 bg-secondary-red  rounded-full w-52 h-52 absolute" ></div>
</div>
<script>
    let scale = 1;
    console.log(screen.width);
    if (screen.width >= 1440) {
        scale = 1.25;
    }
    if (screen.width >= 1536) {
        scale = 1.65;
    }

    let tl = anime.timeline({
        targets:'.circle',
        easing: 'easeOutExpo',
    });
    tl.add({
        targets:'#circle1',
        scale:[0,scale],
        duration:2000,
    });
    tl.add({
        targets:'#circle2',
        scale:[0,scale],
        duration:1000,
    },'-=1600');
    tl.add({
        targets:'#circle3',
        scale:[0,scale],
        duration:1000,
    },'-=1400');
    tl.add({
        targets:'#circle4',
        scale:[0,scale],
        duration:1000,
    },'-=1200');
</script>
@endsection
