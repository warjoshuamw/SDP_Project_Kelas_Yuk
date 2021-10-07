@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuru')
@endsection
@section('content')
    <div class="flex flex-row w-full gap-2 break-words p-2 text-xs lg:text-lg">
        <div class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-75 ">
            <div class="font-semibold  border-b-2 mb-2 pb-2">
                Lihat Tugas : Judul Tugas
            </div>
            <div class="flex flex-row gap-2 lg:gap-4 break-normal">
                <div class="">
                    DESKRIPSI TUGAS || Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non aperiam at cumque? Id officia minima ipsum, quam pariatur, tenetur nesciunt culpa aliquid esse neque ullam! Aspernatur quis quod officiis officia. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque maiores libero voluptas soluta ducimus unde inventore veniam, animi possimus ullam, corporis quaerat facilis. Dignissimos praesentium laudantium iste, quas consectetur velit!
                </div>
                <div class="">

                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-75 ">
            <div class="font-semibold border-b-2 mb-2 pb-2">Submit Tugas</div>
            <div>
                <input type="file" name="" id="">
            </div>
        </div>
    </div>
@endsection
@section('footer')
    guru here
@endsection

