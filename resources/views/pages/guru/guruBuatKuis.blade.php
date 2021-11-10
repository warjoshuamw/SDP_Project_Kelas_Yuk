@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
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
                        <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Judul Kuis">
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        waktu mulai
                        </label>
                        <input type="datetime-local" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Judul Kuis">
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        waktu berakhir
                        </label>
                        <input type="datetime-local" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Judul Kuis">
                    </div>
                </div>
            </div>

        </div>
        <div class="flex md:flex-row flex-col w-3/4">
            <div class="w-auto md:w-24 md:sticky md:top-4 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2 h-44 items-center">
                <div class="font-semibold">Kontrol</div>
                <div class="flex md:flex-col flex-wrap gap-1 h-min my-2">
                    <div x-data="{ dropdownOpen: true }" class="relative z-50">
                        <button onclick="openDropDown()" class="h-12 w-12 text-white rounded-lg bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block rounded-full text-3xl mr-auto">
                            <img src="{{url('/asset/add.png')}}" class="mx-auto" alt="">
                        </button>
                        <div id="dropDown" class="absolute right-0 mt-2 w-32 bg-white rounded-md overflow-hidden hidden shadow-xl z-50">
                            <button class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200 z-50 w-full" onclick="pilihanGandaAdd()">Pilihan Ganda</button>
                            <button class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200 z-50 w-full" onclick="uraianAdd()">Uraian</button>
                        </div>
                    </div>
                    <a href="/guru/kelas/1/kuis">
                        <button class="h-12 w-12 text-white rounded-lg bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block rounded-full text-3xl mr-auto"><img src="{{url('/asset/save.png')}}" class="mx-auto" alt=""></button>
                    </a>
                </div>
            </div>
            <div id="kuisPertanyaan" class="flex-grow md:ml-2 z-40">

                {{-- @for ($i = 0; $i<3;$i++)
                    @include('components.cardKuisPilgan')
                    @include('components.cardKuisUraian')
                @endfor --}}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        let i = 0;
        function openDropDown(params) {
            let dropDown = document.getElementById('dropDown');
            if (dropDown.classList.contains('hidden')) {
                dropDown.classList.remove('hidden')
            }else{
                dropDown.classList.add('hidden')
            }
        }
        function pilihanGandaAdd() {
            i = i + 1;
            $.ajax({
                method: 'GET',
                url: '/cardKuisPilgan/'+i
            })
            .done( (data) =>{
                $('#kuisPertanyaan').append(data);
                let dropDown = document.getElementById('dropDown');
                dropDown.classList.add('hidden')
            })
        }
        function uraianAdd() {
            i = i + 1;
            $.ajax({
                method: 'GET',
                url: '/cardKuisUraian/'+i
            })
            .done( (data) =>{
                $('#kuisPertanyaan').append(data);
                let dropDown = document.getElementById('dropDown');
                dropDown.classList.add('hidden')
            })
        }
    </script>
@endsection
@section('footer')
    guru Here
@endsection
