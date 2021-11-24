@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
<div class="flex flex-row gap-2 break-words p-2 text-xs lg:text-lg flex-wrap w-full md:w-3/4 m-auto">
    <div class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md p-5 flex flex-col bg-opacity-75 flex-shrink w-full">
        <div class="font-semibold  border-b-2 mb-2 pb-2">
            Lihat Kuis : {{$dataKuis->kuis_judul}}
        </div>
        <div class="flex flex-row gap-2 lg:gap-4 break-normal">
            <div class="">
                Kuis dimulai : {{$dataKuis->batas_awal}}
            </div>
            <div class="">
                Kuis berakhir : {{date( 'd M H:i:s', strtotime($dataKuis->batas_akhir) )}}
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row flex-wrap p-5 bg-opacity-75 w-full">


        @foreach ($dataKelas->Murid as $Murid)
            @php
                $status = false;
            @endphp
            @foreach ($dataKuis->D_Kuis as $D_Kuis)
                @foreach ($D_Kuis->KuisJawaban as $jawaban)
                    @if ($jawaban->pengguna_id == $Murid->pengguna_id )
                        @php
                            $status = true;
                        @endphp
                    @endif
                @endforeach
            @endforeach
            @include('components.cardQuizMurid',['nama_user'=>$Murid->pengguna_nama,'status'=>$status,'idMurid'=>$Murid->pivot->murid_id])
        @endforeach
    </div>
</div>
@endsection
@section('footer')
    guru here
@endsection
