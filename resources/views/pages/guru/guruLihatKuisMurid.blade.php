@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
    <div class="flex flex-col items-center">
        <div class="w-3/4 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
            <div class="font-semibold border-b border-black">
                Penilaian Kuis
            </div>
            <div class="flex flex-wrap my-2">
                <div class="w-full lg:w-6/12 px-4 m-auto">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        Judul Kuis
                        </label>
                        <div class="font-semibold">
                            {{$dataKuis->kuis_judul}}
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        waktu pengumpulan terakhir
                        </label>
                        20/12/2005
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        waktu pengumpulan
                        </label>
                        20/12/2006
                    </div>
                </div>
            </div>

        </div>
        <div class="flex md:flex-row flex-col w-3/4">
            <div class="flex-grow  z-40">
                @foreach ($dataKuis->D_Kuis as $kuis)
                    @php
                        $jawaban_murid_kuis = DB::table('jawaban_murid_kuis')->where('d_kuis_id','=',$kuis->d_kuis_id)->where('murid_id','=',$murid_id)->first();
                    @endphp
                    @if ($kuis->pilihan)
                        @include('components.cardKuisPilganPenilaian',['kuis'=>$kuis,'jawaban_murid_kuis'=>$jawaban_murid_kuis])
                    @else
                        @include('components.cardKuisUraianPenilaian',['kuis'=>$kuis,'jawaban_murid_kuis'=>$jawaban_murid_kuis])
                    @endif
                @endforeach
                {{-- @for ($i = 0; $i<3;$i++)
                    @include('components.cardKuisPilganPenilaian')
                    @include('components.cardKuisUraianPenilaian')
                @endfor --}}
            </div>
        </div>
    </div>
    <script>
        function openDropDown(params) {
            let dropDown = document.getElementById('dropDown');
            if (dropDown.classList.contains('hidden')) {
                dropDown.classList.remove('hidden')
            }else{
                dropDown.classList.add('hidden')
            }
        }
    </script>
@endsection
@section('footer')
    guru Here
@endsection
