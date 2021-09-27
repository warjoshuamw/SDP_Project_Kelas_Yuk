@extends('layout.Layout_Login')
@section('title')
    Page Register
@endsection

@section('header')


@endsection

@section('main')

<div class="h-screen w-auto bg-gradient-to-r from-blue-400 via-purple-500 to-white-500  mx-auto flex justify-center items-center">
    <div class="justify-center flex-col flex ml-auto mr-auto items-center w-full lg:w-2/3 md:w-3/5 h-screen">
        <form action="" class="form p-6 my-10 relative w-2/3 h-4/5 ">
            <h3 class="text-2xl font-semibold text-white">Kelas Yuk!</h3>
            <p class="text-white"> Halaman Register</p>
            <div class="flex space-x-5 mt-3">
                <input type="text" name="" id="Nama_depan" placeholder="Nama Depan" class="border p-2  w-1/2">
                <input type="text" name="" id="Nama_Bekalang" placeholder="Nama Belakang" class="border p-2 w-1/2">
            </div>
            <input type="email" name="" id="Email" placeholder="Email Kamu" class="border p-2 w-full mt-3">
            <div class="flex space-x-5 mt-3">
                <input type="password" name="" id="Password" placeholder="Password" class="border p-2  w-1/2">
                <input type="password" name="" id="Konfirmasi_Password" placeholder="Konfirmasi Password" class="border p-2 w-1/2">
            </div>
            <textarea name="" id="" cols="10" rows="3" placeholder="Ceritakan Tentangmu" class="border p-2 mt-3 w-full"></textarea>
            <div class="flex space-x-5 mt-3">
            <a href="/login" class="text-2xl text-white text-left font-roboto leading-normal hover:underline p-2  w-1/4">Login Saja</a>
            <input type="submit" value="Submit" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold border p-2  w-3/4">
            </div >


        </form>
  </div>
  </div>


@endsection

@section('footer')

@endsection







</body>
</html>

