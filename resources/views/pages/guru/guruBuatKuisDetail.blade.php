@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
<form id="myForm" action="{{url('guru/kelas/'.$id_kelas_sekarang.'/kuis/buat/'.($pages+1))}}" method="get" name="myForm">
    @csrf
    <div class="flex flex-col items-center">
        <div class="w-3/4 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
            <div class="font-semibold border-b border-black mb-2">
                Soal {{$pages}}
            </div>
            <div>
                <input type="radio" name="jenis" id="pilgan" value="pilgan" onchange="changeType();" class="mr-2">Pilihan ganda
                <input type="radio" name="jenis" id="uraian" value="uraian" onchange="changeType();" class="mr-2">Uraian
            </div>
            <div class="flex flex-wrap my-2" id="kuisPertanyaan">

            </div>
            <div class="flex self-end gap-2">
                <button type="submit" class="py-2 px-1 px-4 text-white bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-lg text-base md:text-xl w-1/2 md:w-auto" name="btnTeruskan" value="teruskan">Tambah Soal</button>
                <button type="submit" class="py-2 px-1 px-4 text-white bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-lg text-base md:text-xl w-1/2 md:w-auto" name="btnSimpan" value="simpan">Berhenti</button>
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
