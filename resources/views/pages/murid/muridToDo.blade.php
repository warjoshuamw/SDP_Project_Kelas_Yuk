@extends('layout.layout_murid')
@section('navbar')
    @include('pages.essential.navbarMurid')
@endsection
@section('content')

@foreach ($kelasMurid as $kelas)

<section class="container mx-auto p-6 font-mono">
    <div class="flex flex-col gap-2 bg-white shadow mb-2 rounded-md">
        <div class="border-b border-black p-2">
            <span>Kelas : {{$kelas->kelas_nama}}</span>
        </div>
        <div class="px-2 py-1">
            <span>Tugas</span>
            <div class="items-center">
                @foreach ($kelas->Tugas as $tugas)
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
        <div class="px-2 py-1">
            <div>Kuis</div>
            @foreach ($kelas->Kuis as $kuis)
            @include('components.kuisCard',['judul'=>$kuis->kuis_judul,'url'=>'/murid/kelas/'.$kelas->kelas_id.'/kuis/'.$kuis->kuis_id])
            @endforeach
        </div>

    </div>


  </section>
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
    guru here
@endsection

