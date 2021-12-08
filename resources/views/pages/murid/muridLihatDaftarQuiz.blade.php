@extends('layout.layout_murid')
@section('navbar')
    @include('pages.essential.navbarMuridDalamKelas')
@endsection
@section('content')
<div class="flex flex-col md:flex-row gap-2">

    <div class="flex flex-row flex-wrap my-2 m-2 lg:mx-auto justify-center">
        @for ($i = 0; $i < 3;$i++)
            @include('components.kuisCard',['url'=>'/murid/kelas/1/quiz/1'])
        @endfor
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


@endsection
@section('footer')

@endsection
