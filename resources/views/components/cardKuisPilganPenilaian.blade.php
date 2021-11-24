<div class="w-full gap-2 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
    <div>
        <label class="flex flex-col">
            <span class="ml-2">Soal Pilihan Ganda</span>
            <div class="font-semibold">{{$kuis->kuis_judul}}</div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="" value="1" {{$jawaban_murid_kuis->jawaban==1?"checked":""}}>
            <div class="ml-2">
                {{$kuis->pilihan_a}}
            </div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="" value="2" {{$jawaban_murid_kuis->jawaban==2?"checked":""}}>
            <div class="ml-2">
                {{$kuis->pilihan_b}}
            </div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="" value="3" {{$jawaban_murid_kuis->jawaban==3?"selected":""}}>
            <div class="ml-2">
                {{$kuis->pilihan_c}}
            </div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="" value="4" {{$jawaban_murid_kuis->jawaban==4?"selected":""}}>
            <div class="ml-2">
                {{$kuis->pilihan_d}}
            </div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            Nilai :
            <input type="number" name="nilai[{{$jawaban_murid_kuis->jawaban_murid_kuis_id}}]" id="" max="100" min="0" class="ml-2 rounded-md shadow-sm px-2" required>
        </label>
    </div>
</div>
