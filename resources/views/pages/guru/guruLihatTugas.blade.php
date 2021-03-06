@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
@if (session('message'))
    @php
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        alert(session('message'));
    @endphp
@endif
    <div class="flex flex-row w-full gap-2 break-words p-2 text-xs lg:text-lg flex-wrap">
        <div class="bg-white w-screen dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md p-5 flex flex-col bg-opacity-75 flex-shrink">
            <div class="font-semibold  border-b-2 mb-2 pb-2">
                {{-- @dd($dataTugas) --}}
                {{$dataTugas->tugas_nama}}
            </div>
            <div class="flex flex-row gap-2 lg:gap-4 break-normal">
                <div class="">
                    {{$dataTugas->tugas_keterangan}}
                </div>
            </div>
            <div class="flex flex-row gap-2 lg:gap-4 break-normal">
                <a href="{{ url("downloadall/$dataKelas->kelas_id/$dataTugas->tugas_id") }}">
                    <button class="mt-2 place-self-center hover:underline hover:text-blue text-black font-bold py-2 px-4 rounded dark:bg-indigo-100 bg-indigo-200 hover:bg-indigo-300 dark:hover:bg-indigo-300">
                        Download All
                    </button>
                </a>
            </div>


        </div>
        <div class="bg-white w-screen dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row flex-wrap p-5 bg-opacity-75">
            @foreach ($datatugasmurid as $item)

            @include('components.cardFileMurid',
            [
                'nama'=>$item->PunyaMurid->PunyaUser->pengguna_nama,
                'url'=>$item->url_pengumpulan,
            ])

            @endforeach
        </div>
    </div>
@endsection
@section('footer')

@endsection

