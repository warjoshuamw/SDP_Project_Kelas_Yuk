@extends('layout.layout_murid')
@section('content')
    <div>
        <div id="sideBar" class="">
            <div class="h-screen w-48 px-4 border-r bg-white">
                <div class="h-3/4 flex flex-col justify-around text-gray-500">
                   <h3 class="pl-1 text-sm flex items-center py-2 mb-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
                      <a class="hover:text-black transition duration-200 ease-linear" href="#">Home</a>
                   </h3>
                   <h3 class="pl-1 text-sm flex items-center py-2 mb-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
                      <a class="hover:text-black transition duration-200 ease-linear" href="#">Settings</a>
                   </h3>
                </div>
             </div>
        </div>
    </div>
@endsection
