@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuru')
@endsection
@section('content')
<div class="flex flex-wrap justify-center gap-8 items-center h-full m-2 lg:m-10">
    @for ($i = 0; $i < 9; $i++)
            @include('components.kelasCard')
    @endfor
</div>
@endsection
@section('footer')
    guru here
@endsection
