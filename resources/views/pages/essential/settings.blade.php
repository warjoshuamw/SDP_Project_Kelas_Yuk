@extends('layout.layout_murid')
@section('navbar')
    @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran == 0)
        @include('pages.essential.navbarGuru')
    @else
        @include('pages.essential.navbarMurid')
    @endif
@endsection
@section('content')
<div class="flex flex-col items-center px-2 my-2 w-full">
    <div class="text-2xl font-bold bg-white dark:text-black dark:bg-ocean-light dark:bg-opacity-75 w-full lg:w-1/2 text-center rounded-md shadow-md py-4">
        Settings
    </div>
    <div class="bg-white dark:text-black dark:bg-ocean-light dark:bg-opacity-75 px-5 w-full lg:w-1/2 shadow-md rounded-md py-3 backdrop-filter backdrop-blur flex flex-col gap-2 my-2 items-center w-auto">
        <form action="/settings/update" method="" class="flex flex-col my-4 xl:w-1/2 w-full gap-2">
            <div class="flex flex-col">
                <label class="font-bold text-lg">Foto profile</label>
                <img src="" alt="." class="w-64 h-64 self-center my-2" style="object-fit: cover">
                <input type="file" placeholder="Insert here" class="border rounded-lg py-3 px-3 border-black dark:bg-ocean-light dark:bg-opacity-100" ">
            </div>
            <div class="flex flex-col">
                <label class="font-bold text-lg">Nama</label>
                <input type="text" placeholder="Nama" class="border rounded-lg py-3 px-3 border-black dark:bg-ocean-light dark:bg-opacity-100" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}">
            </div>
            <div class="flex flex-col">
                <label class="font-bold text-lg">Email</label>
                <input type="text" placeholder="Email" class="border rounded-lg py-3 px-3 border-black dark:bg-ocean-light dark:bg-opacity-100" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_email}}">
            </div>
            <div class="flex flex-col">
                <label class="font-bold text-lg">Password</label>
                <input type="password" placeholder="************" class="border rounded-lg py-3 px-3 border-black dark:bg-ocean-light dark:bg-opacity-100" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_password}}">
            </div>
            <div class="flex flex-col">
                <label class="font-bold text-lg">Peran</label>
                <input type="text" placeholder="Amount in INR" class="border rounded-lg py-3 px-3 border-black dark:bg-ocean-light dark:bg-opacity-100" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_role==0?"Guru":"Murid"}}" readonly>
            </div>
            <button type="submit" class="bg-secondary-red text-black hover:bg-secondary-red-hover py-4 text-center md:px-6 md:py-4 rounded leading-tight text-xl md:text-base font-sans">Save Changes</button>
        </form>
    </div>
</div>
@endsection
