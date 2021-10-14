<div class="w-full gap-2 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
    <div>
        <label class="flex flex-col">
            <span class="ml-2">Soal Pilihan Ganda</span>
            <div class="font-semibold">ANGGAPLAH INI SOALNYA BLABLABLA</div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="radio{{$i}}" value="1" checked>
            <div class="ml-2">
                ANGGAPLAH INI JAWABAN PERTAMA
            </div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="radio{{$i}}" value="2">
            <div class="ml-2">
            ANGGAPLAH INI JAWABAN KEDUA
            </div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="radio{{$i}}" value="3">
            <div class="ml-2">
            ANGGAPLAH INI JAWABAN KETIGA
            </div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="radio{{$i}}" value="2">
            <div class="ml-2">
            ANGGAPLAH INI JAWABAN KEEMPAT
            </div>
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            Nilai :
            <input type="number" name="" id="" max="100" min="0" class="ml-2 rounded-md shadow-sm px-2">
        </label>
    </div>
</div>
