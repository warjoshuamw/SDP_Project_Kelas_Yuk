<div class="bg-white rounded-md p-2 lg:p-4 dark:bg-ocean-light dark:bg-opacity-50">
    <div class="flex flex-row justify-between gap-2 font-semibold border-b-2">
        <div class="text-lg">{{$feed_creator}}</div>
        <div class="text-lg">{{$feed_waktu}}</div>
    </div>
    <div class="text-xs lg:text-base">
        {{$keterangan}}
    </div>
    @foreach ($dataComment->get() as $comment)
        <div class="border-t-2">
            ini comment
        </div>
    @endforeach
    <form action="{{url('/guru/kelas/'.$dataKelas->kelas_id.'/home/comment/'.$feed_id.'/add')}}" class="flex pt-2">
        <input type="text" name="comment" id="" class="border border-gray-400 rounded-lg w-auto flex-grow mr-4">
        <button type="submit" class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block w-auto">Tambah Komentar</button>
    </form>
</div>
