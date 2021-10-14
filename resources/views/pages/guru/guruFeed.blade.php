@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
    <div class="flex flex-col w-full gap-2 flex-wrap break-words p-2 text-xs lg:text-lg">
        <div class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur">
            <div>
                DASHBOARD
            </div>
            <div class="flex flex-row gap-2 lg:gap-4 break-normal">
                <div class="flex-shrink-0">
                    Judul Kelas
                </div>
                <div class="">
                    DESKRIPSI KELAS ||Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non aperiam at cumque? Id officia minima ipsum, quam pariatur, tenetur nesciunt culpa aliquid esse neque ullam! Aspernatur quis quod officiis officia. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque maiores libero voluptas soluta ducimus unde inventore veniam, animi possimus ullam, corporis quaerat facilis. Dignissimos praesentium laudantium iste, quas consectetur velit!
                </div>
            </div>
        </div>
        <div class="flex flex-row w-full gap-4 ">
            <div class="flex-initial bg-white dark:bg-ocean-light sticky top-4 overflow-y-auto h-96 dark:bg-opacity-50 shadow-md rounded-md flex flex-col bg-opacity-75 backdrop-filter backdrop-blur min-w-prose break-words">
                <div class="bg-gray-200 bg-opacity-50 px-5 dark:bg-ocean-light dark:bg-opacity-50 rounded-md">
                    Notification
                </div>
                <div class="flex flex-col px-5 py-2 gap-2">
                    @for ($i = 0; $i < 16; $i++)
                        @include('components.kelasNotificationCard')
                    @endfor
                </div>
            </div>
            <div class="flex-auto w-2/3 bg-none">
                <div class=" px-5 bg-gray-200 py-2 dark:bg-ocean-light dark:bg-opacity-50 rounded-md">Feed Kelas</div>
                <div class=" py-2 flex flex-col gap-2">
                    <div class="rounded-md bg-white dark:bg-ocean-light dark:bg-opacity-50 p-2">
                        <textarea name="" id="" rows="3" class="w-full rounded-lg p-2" placeholder="Masukkan Text Disini"></textarea>
                        <button class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block">Post</button>
                    </div>
                    @for ($i = 0; $i < 9; $i++)
                        @include('components.feedCard')
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    kelas guru
@endsection
