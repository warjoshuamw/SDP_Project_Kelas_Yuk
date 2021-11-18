<div id="" class="w-full gap-2 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-50 backdrop-filter backdrop-blur p-2 lg:p-5 my-2">
    <div>
        <label class="flex flex-col">
            <div class="flex justify-between mb-2 border-b border-gray-400 pb-1">
                <span class="ml-2">Soal uraian</span>
            </div>
            <span>Soal : </span>
            <input type="text" class="rounded-md shadow w-full px-2 py-1 border border-gray-400" name="uraian" id="">
            @error('uraian')
                <div class="text-xs text-red-500">{{$message}}</div>
            @enderror
            <span>Jawaban : </span>
            <input type="text" class="rounded-md shadow w-full px-2 py-1 border border-gray-400" name="uraianJawaban" id="">
            @error('uraianJawaban')
                <div class="text-xs text-red-500">{{$message}}</div>
            @enderror
        </label>
    </div>
</div>
