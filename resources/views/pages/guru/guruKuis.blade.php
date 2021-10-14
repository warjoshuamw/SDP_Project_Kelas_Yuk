@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
<div class="flex flex-col md:flex-row gap-2">
    <div class="flex flex-col items-center justify-start my-4 mx-2 px-2">
        <a href="/guru/kelas/1/kuis/buat">
            <button class="py-2 pb-3 px-4 text-white rounded-lg bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-full text-3xl">+</button>
        </a>
    </div>
    <div class="flex flex-row flex-wrap my-2 m-2 lg:mx-auto justify-center">
        @for ($i = 0; $i < 9;$i++)
            @include('components.kuisCard',['url'=>'/guru/kelas/1/kuis/{{$i}}'])
        @endfor
    </div>
</div>


@endsection
@section('footer')
    guru here
@endsection
