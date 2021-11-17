@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
<form id="myForm" action="{{url('guru/kelas/'.$id_kelas_sekarang.'/kuis/buat/1')}}" method="GET" name="myForm">
    @csrf
    <div class="flex flex-col items-center">
        <div class="w-3/4 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
            <div class="font-semibold border-b border-black mb-2">
                Pembuatan Kuis
            </div>
            <div class="flex flex-wrap my-2">
                <div class="w-full lg:w-6/12 px-4 m-auto">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        Judul Kuis
                        </label>
                        <input type="text" class="border-0 text-black px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Judul Kuis">
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        waktu mulai
                        </label>
                        <input type="datetime-local" class="border-0 text-black px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Judul Kuis">
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        waktu berakhir
                        </label>
                        <input type="datetime-local" class="border-0 text-black px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Judul Kuis">
                    </div>
                </div>
            </div>
            <div class="self-end">
                <button type="submit" class="py-2 px-1 px-4 text-white bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-lg text-xl">Mulai Membuat Kuis</button>
            </div>
        </div>
    </div>
</form>
@endsection
@section('footer')
@endsection
