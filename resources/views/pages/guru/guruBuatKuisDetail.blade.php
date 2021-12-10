@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
<form id="myForm" action="{{url('guru/kelas/'.$id_kelas_sekarang.'/kuis/buat/'.($pages).'/do')}}" method="get" name="myForm">
    @csrf
    <div class="flex flex-col items-center">
        <div class="w-3/4 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
            <div class="font-semibold border-b border-black mb-2">
                Soal {{$pages}}
            </div>
            <div>
                <input type="radio" name="jenis" id="pilgan" value="pilgan" onchange="changeType();" class="mr-2" {{$jenis=="pilgan"?"checked":""}}>Pilihan ganda
                <input type="radio" name="jenis" id="uraian" value="uraian" onchange="changeType();" class="mr-2" {{$jenis=="uraian"?"checked":""}}>Uraian
            </div>
            <div class="flex flex-wrap my-2" id="kuisPertanyaan">
                @if (isset($jenis))
                    @if ($jenis == "pilgan")
                        <div id="" class="w-full gap-2 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
                            <div>
                                <label class="flex flex-col">
                                    <div class="flex justify-between mb-2 border-b border-black pb-1">
                                        <span class="ml-2">Soal Pilihan Ganda</span>
                                    </div>
                                    <input type="text" class="rounded-md shadow px-2 py-1 border border-gray-400" name="soal" id="" value="{{$data->pertanyaan}}">
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio px-2 py-1" name="radio" value="1" {{$data->pilihan==1?"checked":""}}>
                                    <input type="text" name="pilihan_a" id="" class="ml-2 rounded-md border border-gray-400 shadow-sm" value="{{$data->pilihan_a}}">
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio px-2 py-1" name="radio" value="2" {{$data->pilihan==2?"checked":""}}>
                                    <input type="text" name="pilihan_b" id="" class="ml-2 rounded-md border border-gray-400 shadow-sm" value="{{$data->pilihan_b}}">
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio px-2 py-1" name="radio" value="3" {{$data->pilihan==3?"checked":""}}>
                                    <input type="text" name="pilihan_c" id="" class="ml-2 rounded-md border border-gray-400 shadow-sm" value="{{$data->pilihan_c}}">
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio px-2 py-1" name="radio" value="4" {{$data->pilihan==4?"checked":""}}>
                                    <input type="text" name="pilihan_d" id="" class="ml-2 rounded-md border border-gray-400 shadow-sm" value="{{$data->pilihan_d}}">
                                </label>
                            </div>
                            <div class="text-xs">pilih jawaban untuk menyimpan</div>
                        </div>
                    @elseif ($jenis == "uraian")
                        <div id="" class="w-full gap-2 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
                            <div>
                                <label class="flex flex-col">
                                    <div class="flex justify-between mb-2 border-b border-gray-400 pb-1">
                                        <span class="ml-2">Soal uraian</span>
                                    </div>
                                    <span>Soal : </span>
                                    <input type="text" class="rounded-md shadow w-full px-2 py-1 border border-gray-400" name="uraian" id="" value="{{$data->pertanyaan}}">
                                    @error('uraian')
                                        <div class="text-xs text-red-500">{{$message}}</div>
                                    @enderror
                                    <span>Jawaban : </span>
                                    <input type="text" class="rounded-md shadow w-full px-2 py-1 border border-gray-400" name="uraianJawaban" id="" value="{{$data->isian}}">
                                    @error('uraianJawaban')
                                        <div class="text-xs text-red-500">{{$message}}</div>
                                    @enderror
                                </label>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
            <div class="flex self-end gap-2">
                @if ($pages > 1)
                <button type="submit" class="justify-self-start py-2 px-1 px-4 text-white bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-lg text-base md:text-xl w-1/2 md:w-auto" name="btnKembali" value="kembali">Kembali Ke Soal Sebelumnya</button>
                @endif
                <button type="submit" class="py-2 px-1 px-4 text-white bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-lg text-base md:text-xl w-1/2 md:w-auto" name="btnTeruskan" value="teruskan">Tambah Soal</button>
                <button type="submit" class="py-2 px-1 px-4 text-white bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-lg text-base md:text-xl w-1/2 md:w-auto" name="btnSimpan" value="simpan">Selesai</button>
            </div>

        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function changeType() {
        if($('#pilgan').is(':checked')){
            $.ajax({
                method: 'GET',
                url: '/cardKuisPilgan/'
            })
            .done( (data) =>{
                $('#kuisPertanyaan').html(data);
            })
        }else{
            $.ajax({
                method: 'GET',
                url: '/cardKuisUraian/'
            })
            .done( (data) =>{
                $('#kuisPertanyaan').html(data);
            })
        }
    }
</script>
@endsection
@section('footer')
@endsection
