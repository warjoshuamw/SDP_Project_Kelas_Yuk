@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
<section class="container mx-auto p-6 font-mono ">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 dark:bg-ocean-light dark:bg-opacity-50 uppercase border-b border-gray-600">
              <th class="px-4 py-3">Nama Murid</th>
              <th class="px-4 py-3">Nilai Tugas 1</th>
              <th class="px-4 py-3">Nilai Tugas 2</th>
              <th class="px-4 py-3">Nilai Tugas 3</th>
            </tr>
          </thead>
          <tbody class="bg-white">
              @foreach ( as )
                <tr class="text-gray-700 dark:bg-ocean-light dark:bg-opacity-50">
                    <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                        <div>
                        <p class="font-semibold text-black">Nama</p>
                        </div>
                    </div>
                    </td>
                    <td class="text-ms border"><input type="number" class="w-full dark:bg-ocean-light dark:bg-opacity-50 px-4 py-3 " value=""></td>
                    <td class="text-ms border"><input type="number" class="w-full dark:bg-ocean-light dark:bg-opacity-50 px-4 py-3 " value=""></td>
                    <td class="text-ms border"><input type="number" class="w-full dark:bg-ocean-light dark:bg-opacity-50 px-4 py-3 " value=""></td>
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
