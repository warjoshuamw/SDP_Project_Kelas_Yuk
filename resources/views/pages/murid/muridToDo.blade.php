@extends('layout.layout_murid')
@section('navbar')
    @include('pages.essential.navbarMurid')
@endsection
@section('content')

@foreach ($kelasMurid as $kelas)

{{-- @dd(count($kelas->Tugas()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get()) ) --}}
@if (count($kelas->Tugas()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get()) ==0 && count($kelas->Kuis()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get()) ==0)

@else
<section class="container mx-auto p-6">
    <div class="flex flex-col gap-2 bg-white shadow mb-2 rounded-md dark:bg-ocean-light dark:bg-opacity-50">

        <div class="border-b border-black p-2">
            <span class="dark:bg-ocean-light dark:bg-opacity-75 p-5 flex shadow-md rounded-md flex-col bg-opacity-75 flex-shrink w-full text-xl font-semibold">Kelas : {{$kelas->kelas_nama}}</span>
        </div>

        @if (count($kelas->Tugas()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get()) ==0 )

        @else
        <div class="px-5">
            <div class="py-2 bg-white dark:bg-ocean-light dark:bg-opacity-75 border border-black rounded-md flex flex-col bg-opacity-75 flex-shrink w-full">
                <span class="font-semibold border-b border-black px-2">Tugas</span>
                <div class="items-center ">
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
        </div>
        @endif
        <div class="px-5 mb-2">
            @if (count($kelas->Kuis()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get()) ==0 )

            @else
            <div class="py-2 bg-white dark:bg-ocean-light dark:bg-opacity-75 border border-black rounded-md flex flex-col bg-opacity-75 flex-shrink w-full">
                <div class="font-semibold border-b border-black px-2">
                    Kuis
                </div>
                @foreach ($kelas->Kuis()->where('batas_akhir','>=',\Carbon\Carbon::now())->where('batas_awal','<=',\Carbon\Carbon::now())->get() as $kuis)
                    @include('components.kuisCard',['judul'=>$kuis->kuis_judul,'url'=>'/murid/kelas/'.$kelas->kelas_id.'/kuis/'.$kuis->kuis_id])
                @endforeach
            </div>
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

