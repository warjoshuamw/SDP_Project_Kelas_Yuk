@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
    <div class="bg-white dark:text-black dark:bg-ocean-light dark:bg-opacity-75 shadow-md rounded-md py-3 bg-opacity-75 backdrop-filter backdrop-blur md:w-2/3 md:mx-auto h-full flex flex-col gap-2 flex-grow my-2">
        <div class="text-3xl border-b-2 border-black px-5 mb-2 pb-2">Murid</div>
        @foreach ($dataMurid as $murid)
            <div class="mx-2 p-2 border-b border-gray-500 rounded-md shadow bg-white dark:bg-ocean-light"><span class="border-r border-black py-2 pl-2 pr-4">{{$loop->index+1}}</span><span class="pl-4">{{$murid->pengguna_nama}}</span></div>
        @endforeach
    </div>
@endsection
@section('footer')

@endsection
