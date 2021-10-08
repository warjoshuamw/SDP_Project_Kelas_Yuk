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
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">Nilai Tugas 1</th>
              <th class="px-4 py-3">Nilai Tugas 2</th>
              <th class="px-4 py-3">Nilai Tugas 3</th>
            </tr>
          </thead>
          <tbody class="bg-white">
                @for ($i = 0; $i < 5; $i++)
                    @include('components.guruPenilaianCard',['id'=>$i])
                @endfor
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
@section('footer')
    kelas Murid
@endsection
