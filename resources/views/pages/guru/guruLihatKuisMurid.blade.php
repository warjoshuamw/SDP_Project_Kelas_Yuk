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
                        {{date('d F H:i',strtotime($dataKuis->batas_awal))}}
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        waktu pengumpulan
                        </label>
                        {{date('d F H:i',strtotime($dataKuis->batas_akhir))}}
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        Nilai Murid
                        </label>
                        @php
                            $totalNilai = 0;
                            $semua_jawaban = $dataKuis->D_Kuis;
                            foreach ($semua_jawaban as $key => $value) {
                                $nilai = DB::table('jawaban_murid_kuis')->where('d_kuis_id','=',$value->d_kuis_id)->where('murid_id','=',$murid_id)->first()->nilai;
                                if ($nilai != null) {
                                    $totalNilai += $nilai;
                                }
                            }
                            echo $totalNilai;
                        @endphp
                    </div>
                </div>
            </div>

        </div>
        <div class="flex md:flex-row flex-col w-3/4">
            <div class="flex-grow  z-40">
                <form action="/guru/kelas/{{$id_kelas_sekarang}}/kuis/{{$dataKuis->kuis_id}}/{{$murid_id}}/simpan" method="POST">

                    @csrf
                    @for ($i = 0; $i < sizeof($dataKuis->D_Kuis); $i++)
                        @php
                            $soal = $dataKuis->D_Kuis[$i];
                            $jawaban = $dataKuis->D_Kuis[$i]->KuisJawaban()->find($murid_id);
                        @endphp
                        @if ($soal->pilihan)
                            @include('components.cardKuisPilganPenilaian',['kuis'=>$soal,'jawaban_murid_kuis'=>$jawaban->pivot->jawaban,'jawaban_murid_kuis_id'=>$jawaban->pivot->jawaban_murid_kuis_id,'nilai'=>$jawaban->pivot->nilai])
                        @else
                            @include('components.cardKuisUraianPenilaian',['kuis'=>$soal,'jawaban_murid_kuis'=>$jawaban->pivot->jawaban,'jawaban_murid_kuis_id'=>$jawaban->pivot->jawaban_murid_kuis_id,'nilai'=>$jawaban->pivot->nilai])
                        @endif
                    @endfor
                    @error('nilai')
                        <div class="w-full gap-2 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2 text-xs text-red-500 ">{{$message}}</div>
                    @enderror
                    <button type="submit" class="py-2 px-1 px-4 text-white bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-lg text-xl">Simpan Penilaian</button>
                </form>

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

@endsection
