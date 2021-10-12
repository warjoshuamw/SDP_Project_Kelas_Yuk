@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
    <div class="flex flex-row w-full gap-2 break-words p-2 text-xs lg:text-lg flex-wrap">
        <div class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md p-5 flex flex-col bg-opacity-75 flex-shrink">
            <div class="font-semibold  border-b-2 mb-2 pb-2">
                Lihat Tugas : Judul Tugas
            </div>
            <div class="flex flex-row gap-2 lg:gap-4 break-normal">
                <div class="">
                    DESKRIPSI TUGAS || Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non aperiam at cumque? Id officia minima ipsum, quam pariatur, tenetur nesciunt culpa aliquid esse neque ullam! Aspernatur quis quod officiis officia. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque maiores libero voluptas soluta ducimus unde inventore veniam, animi possimus ullam, corporis quaerat facilis. Dignissimos praesentium laudantium iste, quas consectetur velit!
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row flex-wrap p-5 bg-opacity-75">
            @for ($i = 0; $i < 9; $i++)
                @include('components.cardFileMurid')
            @endfor
        </div>
    </div>
@endsection
@section('footer')
    guru here
@endsection

