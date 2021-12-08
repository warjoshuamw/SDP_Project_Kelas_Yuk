@extends('layout.layout_murid')
@section('navbar')
    @include('pages.essential.navbarMurid')
@endsection
@section('content')

@foreach ($kelasMurid as $kelas)

{{-- @dd(count($kelas->Tugas()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get()) ) --}}
@if (count($kelas->Tugas()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get()) ==0 && count($kelas->Kuis()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get()) ==0)

@else
<section class="container mx-auto p-6 font-mono">
    <div class="flex flex-col gap-2 bg-white shadow mb-2 rounded-md">

        <div class="border-b border-black p-2">
            <span class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md p-5 flex flex-col bg-opacity-75 flex-shrink w-full">Kelas : {{$kelas->kelas_nama}}</span>
        </div>

        @if (count($kelas->Tugas()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get()) ==0 )

        @else
        <div class="px-2 py-1">
        <span class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md p-5 flex flex-col bg-opacity-75 flex-shrink w-full">Tugas</span>
        <div class="items-center">
            @foreach ($kelas->Tugas()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get() as $tugas)
            @include('components.tugasCard',
                    [
                        'role'=>1,
                        'kelas_id_sekarang'=>$kelas->kelas_id,
                        'tugas_id'=>$tugas->tugas_id,
                        'tugas_nama'=>$tugas->tugas_nama,
                    ])
        @endforeach
        </div>
        </div>
        @endif



            @if (count($kelas->Kuis()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get()) ==0 )

            @else
            <div class="px-2 py-1">
            <div class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md p-5 flex flex-col bg-opacity-75 flex-shrink w-full">Kuis</div>
            @foreach ($kelas->Kuis()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get() as $kuis)
            @include('components.kuisCard',['judul'=>$kuis->kuis_judul,'url'=>'/murid/kelas/'.$kelas->kelas_id.'/kuis/'.$kuis->kuis_id])
            @endforeach
        </div>

    </div>
        @endif

  </section>
@endif


@endforeach



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


@endsection
@section('footer')

@endsection

