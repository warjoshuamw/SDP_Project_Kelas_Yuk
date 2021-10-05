@extends('layout.layout_murid')
@section('navbar')
    @include('pages.essential.navbarMurid')
@endsection
@section('content')
<div><button type="button" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700bg-indigo-600 hover:bg-indigo-700"onclick="document.getElementById('myModal').showModal()">Tambah kelas</button></div>
<div class="flex flex-col md:flex-row gap-2">

    <div class="flex flex-row flex-wrap my-2 m-2 lg:mx-auto">
        @for ($i = 0; $i < 1; $i++)
                @include('components.kelasCard')
        @endfor
    </div>
</div>

<style>
    dialog[open] {
    animation: appear .15s cubic-bezier(0, 1.8, 1, 1.8);
  }

    dialog::backdrop {
      background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(54, 54, 54, 0.5));
      backdrop-filter: blur(3px);
    }


  @keyframes appear {
    from {
      opacity: 0;
      transform: translateX(-3rem);
    }

    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
  </style>

<dialog id="myModal" class="w-11/12 md:w-1/2 p-5  bg-white rounded-md ">
    <div class="flex flex-col w-full h-auto ">
        <div class="flex w-full h-auto justify-end items-center">
            <div class="flex flex-row w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                    Join Kelas
            </div>
            <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </div>
        <div class="flex w-full py-10 px-2 justify-center items-center rounded text-center text-gray-500">
            <div class="lg:col-span-2">
            <div class=" border-solid border-2 border-blue-500 p-3 mb-10">
                <div>
                <label for="full_name">kamu login sebagai</label>
                <input type="text" name="full_name" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                </div>
            </div>
            {{-- bawah --}}
            <div>
                <div class=" border-solid border-2 border-blue-500 p-3">

                    <div>
                    <div class="text-2xl text-left">Kode Kelas</div>
                    <div class="text-base text-left mb-4">Minta kode kelas pada gurumu,lalu masukkan dibawah</div>
                    <input type="text" name="kode" id="kode" class="transition-all flex h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Kode Kelas" value="" />
                    </div>

                    <div class=" text-right">
                        <div class="inline-flex items-end">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Join</button>
                        </div>
                    </div>
            </div>


            </div>
        </div>
    </div>
</dialog>


@endsection
@section('footer')

@endsection
