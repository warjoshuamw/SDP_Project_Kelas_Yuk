<div class="bg-white rounded-md p-2 lg:p-4 dark:bg-ocean-light dark:bg-opacity-75">
    <div class="flex flex-row justify-between gap-2 font-semibold border-b border-black mb-1">
        <div class="text-lg">{{$feed_creator}}</div>
        <div class="text-lg">{{$feed_waktu}}</div>
    </div>
    <div class="text-xs lg:text-base mb-2">
        {{$keterangan}}
    </div>
    @foreach ($dataComment->get() as $comment)
    <div class="ml-8">
        <div class=" flex justify-between border-t border-black mt-1">
            <div><div class="font-semibold text-base">{{$comment->comment_creator}}</div><div class="text-base">{{$comment->keterangan}}</div></div>
            <div class="font-semibold">{{date('d M Y, H:i', strtotime($comment->created_at))}}</div>
        </div>
        <div>
            @foreach ($comment->Reply as $reply)
                <div class="ml-4 flex justify-between border-t border-black mt-1" >
                    <div><div class="font-semibold text-base">{{$reply->reply_creator}}</div><div class="text-base">{{$reply->keterangan}}</div></div>
                    <div class="font-semibold">{{date('d M Y, H:i', strtotime($reply->created_at))}}</div>
                </div>
            @endforeach
        </div>
        @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==0)
        <form action="{{url('/guru/kelas/'.$dataKelas->kelas_id.'/home/reply/'.$comment->comment_id.'/add')}}" class="flex pt-2 ml-4" method="GET">
            <input type="text" name="keterangan" id="" class="border border-gray-400 rounded-lg w-auto flex-grow mr-4 p-1 px-2">
            <button type="submit" class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block w-auto">Balas</button>
        </form>
        @else
        <form action="{{url('/murid/kelas/'.$dataKelas->kelas_id.'/home/reply/'.$comment->comment_id.'/add')}}" class="flex pt-2 ml-4" method="GET">
            <input type="text" name="keterangan" id="" class="border border-gray-400 rounded-lg w-auto flex-grow mr-4 p-1 px-2">
            <button type="submit" class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block w-auto">Balas</button>
        </form>
        @endif


    </div>
    @endforeach
    @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==0)
    <form action="{{url('/guru/kelas/'.$dataKelas->kelas_id.'/home/comment/'.$feed_id.'/add')}}" class="flex pt-2" method="GET">
        <input type="text" name="comment" id="" class="border border-gray-400 rounded-lg w-auto flex-grow mr-4 p-1 px-2">
        <button type="submit" class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block w-auto">Komentar</button>
    </form>
    @else
    <form action="{{url('/murid/kelas/'.$dataKelas->kelas_id.'/home/comment/'.$feed_id.'/add')}}" class="flex pt-2" method="GET">
        <input type="text" name="comment" id="" class="border border-gray-400 rounded-lg w-auto flex-grow mr-4 p-1 px-2">
        <button type="submit" class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block w-auto">Komentar</button>
    </form>
    @endif

</div>
