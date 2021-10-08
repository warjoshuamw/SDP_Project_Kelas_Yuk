@extends('layout.layout_guru')
@section('navbar')
    @include('pages.essential.navbarGuruDalamKelas')
@endsection
@section('content')
<div class="flex flex-col md:flex-row gap-2">
    <div class="flex flex-col items-center justify-start my-4 mx-2 px-2">
        <button class="py-2 pb-3 px-4 text-white rounded-lg bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-full text-3xl" onclick="document.getElementById('myModal').showModal()">+</button>
    </div>
    <div class="flex flex-row flex-wrap my-2 m-2 lg:mx-auto justify-center">
        @for ($i = 0; $i < 9;$i++)
            @include('components.tugasCard')
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
                    Beri Tugas
            </div>
            <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </div>
        <div class="flex w-full py-10 px-2 justify-center items-center rounded text-center text-gray-500">
            <div class="lg:col-span-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                <div class="md:col-span-5">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                </div>

                <div class="md:col-span-5">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="email@domain.com" />
                </div>

                <div class="md:col-span-3">
                <label for="address">Address / Street</label>
                <input type="text" name="address" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                </div>

                <div class="md:col-span-2">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                </div>

                <div class="md:col-span-2">
                <label for="country">Country / region</label>
                <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                    <input name="country" id="country" placeholder="Country" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                    <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    </button>
                    <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                    </button>
                </div>
                </div>

                <div class="md:col-span-2">
                <label for="state">State / province</label>
                <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                    <input name="state" id="state" placeholder="State" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                    <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    </button>
                    <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                    </button>
                </div>
                </div>

                <div class="md:col-span-1">
                <label for="zipcode">Zipcode</label>
                <input type="text" name="zipcode" id="zipcode" class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" value="" />
                </div>

                <div class="md:col-span-5">
                <div class="inline-flex items-center">
                    <input type="checkbox" name="billing_same" id="billing_same" class="form-checkbox" />
                    <label for="billing_same" class="ml-2">My billing address is different than above.</label>
                </div>
                </div>

                <div class="md:col-span-5 text-right">
                <div class="inline-flex items-end">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</dialog>

@endsection
@section('footer')
    guru here
@endsection

