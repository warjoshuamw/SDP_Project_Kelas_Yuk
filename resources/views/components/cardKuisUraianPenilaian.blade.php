<div
    class="w-full gap-2 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
    <div>
        <label class="flex flex-col">
            <span class="ml-2">Soal Uraian</span>
            <div class="font-semibold">
                {{$kuis->pertanyaan}}
            </div>
        </label>
    </div>
    <div>
        <label class="flex flex-col bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
            <div class="font-semibold">Kunci Jawaban : {{$kuis->isian}}</div>
            <div>Jawaban Murid : {{$jawaban_murid_kuis}}</div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            Nilai :
            <input type="number" name="nilai[{{$jawaban_murid_kuis_id}}]" id="" max="100" min="0" class="ml-2 rounded-md shadow-sm px-2" value={{$nilai??$nilai}}>
        </label>
    </div>
</div>
