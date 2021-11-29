@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')

<section class="container mx-auto p-6 font-mono">
    <form action="" class="flex flex-col gap-2 bg-white shadow mb-2 rounded-md p-2">
        <div class="border-b border-black">
            <span>Filter : </span>
        </div>
        <div>
            <span>Nama Murid:</span>
            <select name="filter_murid" id="" class="border border-black h-full rounded-md shadow px-2">
                @foreach ($dataMurid as $murid)
                    <option value="{{$murid->pivot->murid_id}}">{{$murid->pengguna_nama}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <span>Jenis Pekerjaan:</span>
            <select name="filter_jenis" id="" class="border border-black h-full rounded-md shadow px-2">
                <option value="quiz">
                    Quiz
                </option>
                <option value="tugas">
                    Tugas
                </option>
            </select>
        </div>
        <button type="submit" class="py-2 px-1 px-4 w-auto md:w-1/4 text-white bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline rounded-lg text-xl">Filter</button>
    </form>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 dark:bg-ocean-light dark:bg-opacity-50 uppercase border-b border-gray-600">
              <th class="px-4 py-3">Judul Kuis</th>
              <th class="px-4 py-3">Nilai</th>
            </tr>
          </thead>
          <tbody class="bg-white">
              @foreach ($dataNilai as $nilai)
                <tr class="text-gray-700 dark:bg-ocean-light dark:bg-opacity-50">
                    <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                        <div>
                        <p class="font-semibold text-black">{{$nilai['judul_kuis']}}</p>
                        </div>
                    </div>
                    </td>
                    <td class="text-ms border text-center"><input type="number" class="w-full dark:bg-ocean-light dark:bg-opacity-50 px-4 py-3" name="" value="{{$nilai['nilai_kuis']}}"></td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
@section('footer')
    kelas Murid
@endsection
