@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarMuridDalamKelas')
@endsection
@section('content')
<section class="container mx-auto p-6 font-mono ">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 dark:bg-ocean-light dark:bg-opacity-50 uppercase border-b border-gray-600">
              <th class="px-4 py-3">Nama Tugas</th>
              <th class="px-4 py-3">Nilai Tugas</th>
            </tr>
          </thead>
          <tbody class="bg-white">
                @for ($i = 0; $i < 5; $i++)
                    @include('components.nilaiMuridCard',['id'=>$i])
                @endfor
                <tr class="text-gray-700 dark:bg-ocean-light dark:bg-opacity-50">
                    <td class="px-4 py-3 border">
                      <div class="flex items-center text-sm">
                        <div>
                          <p class="font-semibold text-black">Nilai Total</p>
                        </div>
                      </div>
                    </td>

                    <td class="text-ms border"><input type="text" readonly class="w-full dark:bg-ocean-light dark:bg-opacity-50 px-4 py-3 " value="Nilai TOT"></td>
                  </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
@section('footer')
    kelas Murid
@endsection
