@extends('layout.layout_murid')
@section('navbar')
    @include('pages.essential.navbarMuridDalamKelas')
@endsection
@section('content')
<div class="flex w-full flex-col justify-center  md:flex-row gap-2">

    <div class="flex flex-col w-full my-2 m-2 items-center">
        @if (isset($dataKuis))
            @foreach ($dataKuis as $kuis)
                @include('components.kuisCard',['judul'=>$kuis->kuis_judul,'url'=>'/murid/kelas/'.$dataKelas->kelas_id.'/kuis/'.$kuis->kuis_id])
            @endforeach
        @endif
    </div>
</div>

<script>

    var textarea = document.querySelector('textarea');

textarea.addEventListener('keydown', autosize);

function autosize(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    // for box-sizing other than "content-box" use:
    // el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}
</script>
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
