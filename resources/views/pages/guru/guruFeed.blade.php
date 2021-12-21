@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
    <div class="flex flex-col w-full gap-2 flex-wrap break-words p-2 md:px-10 text-xs lg:text-lg text-black">
        <div class="bg-white  dark:bg-ocean-light dark:bg-opacity-75 shadow-md rounded-md p-5 bg-opacity-50 backdrop-filter backdrop-blur md:w-2/3 md:mx-auto">
            <div class="flex flex-col gap-2 lg:gap-4 break-normal  justify-between h-full">
                <div class="flex-shrink-0 text-3xl font-semibold border-b border-gray-700 pb-4">
                    {{$dataKelas->kelas_nama}}
                </div>
                <div class="flex-shrink-0 text-lg font-semibold">
                    {{$dataKelas->kelas_deskripsi}}
                </div>
                <div class="flex-shrink-0 text-lg font-semibold">
                    Waktu Kelas : {{date('D H:i', strtotime($dataKelas->waktu_mulai)) . " - " . date('D H:i', strtotime($dataKelas->waktu_selesai))}}
                </div>
                <div class="flex-shrink-0 text-lg font-semibold">
                    Kode Kelas : <input type="text" id="kodekelas" class="appearance-none bg-opacity-0 bg-transparent" disabled value="{{$dataKelas->kelas_kode}}"> <button class="border border-black rounded-md shadow px-2" onclick="myFunction()">Copy</button>
                </div>
            </div>
        </div>
            <div class="flex-auto md:w-2/3 bg-none mx-auto">
                <div class=" px-5 bg-gray-200 py-2 dark:bg-ocean-light dark:bg-opacity-75 rounded-md">Feed Kelas</div>
                <div class=" py-2 flex flex-col gap-2">
                    <div class="rounded-md bg-white dark:bg-ocean-light dark:bg-opacity-75 p-2">
                        <form action="{{url('/guru/kelas/'.$dataKelas->kelas_id.'/home/add')}}">
                            <textarea name="keterangan" id="" rows="3" class="w-full rounded-lg p-2" placeholder="Masukkan Text Disini"></textarea>
                            <button type="submit" class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block">Post</button>
                        </form>
                    </div>
                    @foreach ($dataFeed as $feed)
                        @include('components.feedCard',
                        [
                            'feed_id'=>$feed->feed_id,
                            'feed_creator'=>$feed->feed_creator,
                            'keterangan'=>$feed->keterangan,
                            'feed_waktu'=>date('d M Y, H:i', strtotime($feed->created_at)),
                            'dataComment'=>$feed->Comment()
                        ])
                    @endforeach
                </div>
            </div>
    </div>

    <script>
        function myFunction() {
          var copyText = document.getElementById("kodekelas");

          /* Select the text field */
          copyText.select();
          copyText.setSelectionRange(0, 99999); /* For mobile devices */

          /* Copy the text inside the text field */
          navigator.clipboard.writeText(copyText.value);

          /* Alert the copied text */
          alert("Copied the text: " + copyText.value);
        }
    </script>
@endsection
@section('footer')

@endsection
