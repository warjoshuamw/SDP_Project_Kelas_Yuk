@extends('layout.layout_murid')
@section('navbar')
    @include('pages.essential.navbarMuridDalamKelas')
@endsection
@section('content')

<section class="container mx-auto p-6 font-mono">
    <form action="" class="flex flex-col gap-2 bg-white shadow mb-2 rounded-md dark:bg-ocean-light dark:bg-opacity-75">
        <div class="border-b border-black p-2">
            <span>Filter : </span>
        </div>
        <div class="px-2 py-1 ">
            <span class="">Nama Murid:</span>
            <span class="">{{$dataMurid->pengguna_nama}}</span>
        </div>
        <div class="px-2 py-1">
            <span>Jenis Pekerjaan:</span>
            <select name="filter_jenis" id="" class="border border-black h-full rounded-md shadow px-2 py-1 bg-white dark:bg-ocean-light">
                @isset($filter_jenis)
                    <option value="kuis" {{$filter_jenis=="kuis"?"selected":""}}>
                        Kuis
                    </option>
                    <option value="tugas" {{$filter_jenis=="tugas"?"selected":""}}>
                        Tugas
                    </option>
                @else
                    <option value="kuis">
                        Kuis
                    </option>
                    <option value="tugas" >
                        Tugas
                    </option>
                @endisset
            </select>
        </div>
        <div class="px-2 py-1">
            <button type="submit" class="py-2 px-1 px-4 w-auto md:w-1/4 text-white bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline rounded-lg text-xl">Filter</button>
        </div>
    </form>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 dark:bg-ocean-light dark:bg-opacity-75 uppercase border-b border-gray-600">
              <th class="px-4 py-3">Judul @if (isset($filter_jenis))
                {{$filter_jenis}}
              @endif</th>
              <th class="px-4 py-3">Nilai</th>
            </tr>
          </thead>
          <tbody class="bg-white">
              @foreach ($dataNilai as $nilai)
                <tr class="text-gray-700 dark:bg-ocean-light dark:bg-opacity-75">
                    <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                        <div>
                        <p class="font-semibold text-black">{{$nilai['judul']}}</p>
                        </div>
                    </div>
                    </td>
                    <td class="text-ms border text-center">
                        <input type="number" class="w-full dark:bg-ocean-light dark:bg-opacity-75 px-4 py-3" name="" value="{{$nilai['nilai']}}">
                    </td>
                </tr>
              @endforeach
              @if (sizeof($dataNilai)<=0)
                <tr class="text-gray-700 dark:bg-ocean-light dark:bg-opacity-75">
                    <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                        <div>
                        <p class="font-semibold text-black">Tidak Ada Nilai, Mulai Pencarian untuk menampilkan data</p>
                        </div>
                    </div>
                    </td>
                    <td class="text-ms border text-center">
                        <input type="number" class="w-full dark:bg-ocean-light dark:bg-opacity-75 px-4 py-3" name="" value="">
                    </td>
                </tr>
              @endif
          </tbody>
        </table>
      </div>

    </div>

  </section>
@endsection
@section('footer')

@endsection
