@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuru')
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

<div class="flex flex-col md:flex-row gap-2">
    <div class="flex flex-col items-center justify-start my-4 mx-2">
        <button class="py-2 pb-3 px-4 text-white rounded-lg bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-full text-3xl" onclick="document.getElementById('myModal').showModal()">+</button>
    </div>
    <div class="flex flex-row flex-wrap my-2 m-2 lg:mx-auto">
        @foreach ($dataKelas as $kelas)
            {{-- @dd($kelas->kelas_id); --}}
            {{-- @php
                dump(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$kelas->waktu_mulai)->locale('id')->format('D H:i'));
            @endphp --}}
            @include('components.kelasCard',
            [
                'role'=>$user_login->pengguna_peran,
                'kelas_id'=>$kelas->kelas_id,
                'kelas_nama'=>$kelas->kelas_nama,
                'kelas_deskripsi'=>$kelas->kelas_deskripsi,
                'pengguna_nama'=>$kelas->Guru->pengguna_nama,
                "waktuAwal"=>date('D H:i', strtotime($kelas->waktu_mulai)),
                "waktuAkhir"=>date('D H:i', strtotime($kelas->waktu_selesai)),
            ])
        @endforeach
    </div>
</div>

<style>
    dialog[open] {
        animation: appear .15s cubic-bezier(0, 1.8, 1, 1.8);
    }

    dialog::backdrop {
      background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(54, 54, 54, 0.5));
      backdrop-filter: blur(3px);
    }


  @keyframes appear {
    from {
      opacity: 0;
      transform: translateX(-3rem);
    }

    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
</style>

<dialog id="myModal" class="w-11/12 md:w-1/2 p-5  bg-white rounded-md ">
    <div class="flex flex-col w-full h-auto ">
        <div class="flex w-full h-auto justify-end items-center">
            <div class="flex flex-row w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                    Tambah Kelas
            </div>
            <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </div>
        <form action={{url("guru/kelas/buat")}} method="POST">
            @csrf
            <div class="flex w-full py-10 px-2 justify-center items-center rounded text-center text-gray-500">
                <div class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                    <div class="md:col-span-6">
                    <label for="kelas_nama">Nama Kelas</label>
                    <input type="text" name="kelas_nama" id="kelas_nama" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('kelas_nama')}}" />
                    @error("kelas_nama")
                        <div class="text-xs text-red-500">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="md:col-span-6">
                    <label for="kelas_deskripsi">Deskripsi</label>
                    <input type="text" name="kelas_deskripsi" id="kelas_deskripsi" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('kelas_deskripsi')}}" />
                    @error("kelas_deskripsi")
                        <div class="text-xs text-red-500">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="md:col-span-3">
                    <label for="waktu_mulai">Waktu Mulai</label>
                    <input type="datetime-local" name="waktu_mulai" id="waktu_mulai" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('waktu_mulai')}}" />
                    @error("waktu_mulai")
                        <div class="text-xs text-red-500">{{$message}}</div>
                    @enderror
                    </div>

                    <div class="md:col-span-3">
                    <label for="waktu_selesai">Waktu Berakhir </label>
                    <input type="datetime-local" name="waktu_selesai" id="waktu_selesai" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('waktu_selesai')}}" placeholder="" />
                    @error("waktu_selesai")
                        <div class="text-xs text-red-500">{{$message}}</div>
                    @enderror
                    </div>


                    <div class="md:col-span-6 text-right">
                    <div class="inline-flex items-end">
                        <button type="submit" class="bg-secondary-red hover:bg-secondary-red-hover text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</dialog>


@endsection
@section('footer')

@endsection
