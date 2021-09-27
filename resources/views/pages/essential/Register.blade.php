@extends('layout.Layout_Login')
@section('title')
    Page Register
@endsection

@section('header')


@endsection

@section('main')

<div class="h-screen w-auto bg-gradient-to-r from-blue-400 via-purple-500 to-white-500  mx-auto flex justify-center items-center">
    <div class="justify-center flex-col flex ml-auto mr-auto items-center w-full lg:w-2/3 md:w-3/5 h-screen">
        <form action="" class="form bg-white p-6 my-10 relative w-2/3 h-4/5 ">

            <div class="icon bg-blue-600 text-white w-6 h-6 absolute flex items-center justify-center p-5" style="left:-40px"><i class="fal fa-phone-volume fa-fw text-2xl transform -rotate-45"></i></div>
            <h3 class="text-2xl text-gray-900 font-semibold">Kelas Yuk!</h3>
            <p class="text-gray-600"> Halaman Register</p>
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
            <a href="/Login" class="text-base text-Blue text-right font-roboto leading-normal hover:underline mb-6">Login Saja</a>
            <input type="submit" value="Submit" class="w-full mt-6 bg-blue-600 hover:bg-blue-500 text-white font-semibold p-3">

        </form>
  </div>
  </div>


@endsection

@section('footer')

@endsection







</body>
</html>

