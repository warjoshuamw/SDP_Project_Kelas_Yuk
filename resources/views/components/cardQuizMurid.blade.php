<div class="w-48 bg-gray-300 flex flex-col gap-2 bg-opacity-50 m-2 p-2 rounded-md shadow-md">
    <div>
        <p>{{$nama_user}}</p>
    </div>
    <div class="flex flex-col">
        @if ($status ==  "missing")
        <p class="text-red-700">missing</p>
        @else
        <a href="/guru/kelas/1/kuis/1/1">
            <button class="mt-2 place-self-center hover:underline hover:text-blue text-black font-bold py-2 px-4 rounded dark:bg-secondary-red-hover bg-secondary-red hover:bg-secondary-red-hover dark:hover:bg-secondary-red">
                Lihat Kuis
            </button>
        </a>
        @endif
    </div>
</div>
