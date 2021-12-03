@extends('layout.layout_murid')
@section('navbar')
    @include('pages.essential.navbarMuridDalamKelas')
@endsection
@section('content')
<form action="/murid/kelas/{{$id_kelas_sekarang}}/kuis/{{$id_kuis_sekarang}}/submit" method="POST">
    @csrf
<div class="flex w-full flex-col justify-center  md:flex-row gap-2">
    <div class="flex flex-col w-full my-2 md:m-2 items-center md:p-2 bg-white rounded-md bg-opacity-25">
        <div class="w-full md:w-3/4 bg-white dark:bg-ocean-light dark:bg-opacity-50 break-words shadow-md rounded-md flex flex-col  justify-around items-start bg-opacity-50 backdrop-filter backdrop-blur">
            <div class="font-bold text-2xl w-1/3 p-2 md:ml-20">{{$kuis_sekarang->kuis_judul}}</div>
            <div class="w-1/3 p-2"><span class="font-semibold">Kuis Dimulai</span> : {{date('d F H:i',strtotime($kuis_sekarang->batas_awal))}}</div>
            <div class="w-1/3 p-2"><span class="font-semibold">Kuis Berakhir</span>: {{date('d F H:i',strtotime($kuis_sekarang->batas_akhir))}}</div>
        </div>
        <div class="w-full md:w-3/4 dark:bg-ocean-light dark:bg-opacity-50 break-words  rounded-md flex flex-col mt-2  justify-around items-center bg-opacity-50 backdrop-filter backdrop-blur">
            @if ($status)
                <div class="text-2xl">Anda Sudah Menjawab Kuis Ini</div>
            @else
                @foreach ($kuis_sekarang->D_Kuis as $kuis)
                
                    @if (isset($kuis->pilihan))
                        @include('components.cardKuisPilganMurid',['detail'=>$kuis])
                    @elseif (isset($kuis->isian))
                        @include('components.cardKuisUraianMurid',['detail'=>$kuis])
                    @endif
                @endforeach
                <button type="submit" class="py-2 px-1 px-4 text-white bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-lg text-xl">Simpan Jawaban</button>
            @endif

        </div>
    </div>
</div>
</form>

@endsection
@section('footer')

@endsection
