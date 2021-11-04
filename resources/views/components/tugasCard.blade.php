<div class="w-3/4 bg-white dark:bg-ocean-light m-2 shadow-lg rounded-md flex items-center px-4 py-2 justify-between">
    <div class="text-black font-semibold" >{{$tugas_nama}}</div>
    <div>
        <a href='/guru/kelas/{{$kelas_id_sekarang}}/tugas/{{$tugas_id}}'>
            <button class="hover:underline dark:text-black font-semibold py-2 px-4 rounded bg-button-light dark:bg-button-dark">
                Lihat Tugas
            </button>
        </a>
    </div>
</div>
