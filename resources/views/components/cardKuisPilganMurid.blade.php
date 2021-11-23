<div id="" class="w-full gap-2 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
    <div>
        <label class="flex flex-col">
            <div class="flex justify-between mb-2 border-b border-black pb-1">
                <span class="ml-2"></span>
            </div>
            <div>Soal : {{$detail->pertanyaan}}</div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio px-2 py-1" name="jawaban[{{$detail->d_kuis_id}}]" value="1" checked>
            <span>{{$detail->pilihan_a}}</span>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio px-2 py-1" name="jawaban[{{$detail->d_kuis_id}}]" value="2">
            <span>{{$detail->pilihan_b}}</span>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio px-2 py-1" name="jawaban[{{$detail->d_kuis_id}}]" value="3">
            <span>{{$detail->pilihan_c}}</span>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio px-2 py-1" name="jawaban[{{$detail->d_kuis_id}}]" value="4">
            <span>{{$detail->pilihan_d}}</span>
        </label>
    </div>
</div>
