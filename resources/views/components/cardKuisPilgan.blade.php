<div id="{{$i}}" class="w-full gap-2 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
    <div>
        <label class="flex flex-col">
            <div class="flex justify-between mb-2 border-b border-black pb-1">
                <span class="ml-2">Soal Pilihan Ganda</span>
                <span class="ml-2"><button class="btn-delete shadow-xl border-black rounded-md bg-gray-300 px-2" type="button" idsoal={{$i}}>X</button></span>
            </div>
            <input type="text" class="rounded-md shadow px-2 py-1" name="soal[]" id="">
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio px-2 py-1" name="radio{{$i}}" value="1" checked>
            <input type="text" name="pilihan_a_{{$i}}" id="" class="ml-2 rounded-md border shadow-sm">
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio px-2 py-1" name="radio{{$i}}" value="2">
            <input type="text" name="pilihan_b_{{$i}}" id="" class="ml-2 rounded-md border shadow-sm">
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio px-2 py-1" name="radio{{$i}}" value="3">
            <input type="text" name="pilihan_c_{{$i}}" id="" class="ml-2 rounded-md border shadow-sm">
        </label>
    </div>
    <div>
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio px-2 py-1" name="radio{{$i}}" value="4">
            <input type="text" name="pilihan_d_{{$i}}" id="" class="ml-2 rounded-md border shadow-sm">
        </label>
    </div>
    <div class="text-xs">pilih jawaban untuk menyimpan</div>
</div>
