@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarMuridDalamKelas')
@endsection
@section('content')
    <div class="flex flex-row w-full gap-2 break-words p-2 text-xs lg:text-lg">
        <div class=" w-3/4 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-75 ">
            <div class="font-semibold  border-b-2 mb-2 pb-2">
                {{$dataTugas->tugas_nama}}

            </div>
            <div class="flex flex-row gap-2 lg:gap-4 break-normal">
                <div class="">
                    {{$dataTugas->tugas_keterangan}}
                </div>
                <div class="">

                </div>
            </div>
        </div>

            <form action="/murid/kelas/{{$id_kelas_sekarang}}/tugas/uploadtugas" method="POST" class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-75 " enctype="multipart/form-data">
                @csrf
                <div class="font-semibold border-b-2 mb-2 pb-2">Submit Tugas</div>
                <div>
                    <input type="file" name="file_upload" id="">
                </div>

                <input type="hidden" class="" value="{{$dataTugas->tugas_id}}" name="id_tugas">

                @if ($datalapor->url_pengumpulan!=null)
                <div class=" text-center text-green-400 bg-white-500 text-white font-bold py-2 px-4 rounded">Already Submited</div>
                @else
                <br>
                @endif

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>

            </form>
        </div>
@endsection
@section('footer')
    murid here
@endsection

