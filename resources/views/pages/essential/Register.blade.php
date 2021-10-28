@extends('layout.Layout_Login')
@section('title')
    Page Register
@endsection

@section('header')


@endsection

@section('main')

<form action="{{ url('/register/doregister') }}" method="get" class="flex justify-center h-screen items-center text-center">
    @csrf
    <div class='flex max-w-sm w-full justify-center bg-white shadow-md rounded-lg overflow-hidden mx-auto flex flex-col p-5'>
        <h3 class="text-2xl font-bold mb-4 font-serif text-ocean-dark">Kelas Yuk</h3>

    <div class="relative h-10 input-component mb-5">
      <input
        id="name"
        type="text"
        name="pengguna_nama"
        class=" w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
        @error('pengguna_nama') style="border: 2px solid red;" @enderror value="{{ old('pengguna_nama')}}"
      />
      <label for="name" class="absolute left-2 transition-all bg-white px-1">
        Name
      </label>
    </div>
    @error("pengguna_nama")
    <div class="ml-8 text-red-500 text-bold">{{ $message }}</div>
    @enderror
    <!-- This is the input component -->
    <div class="relative h-10 input-component mb-5">
      <input
        id="email"
        type="text"
        name="pengguna_email"
        class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
        @error('pengguna_nemail') style="border: 2px solid red;" @enderror value="{{ old('pengguna_email')}}"
      />
      <label for="email" class="absolute left-2 transition-all bg-white px-1">
        E-mail
      </label>
    </div>
    @error("pengguna_email")
    <div class="ml-8 text-red-500 text-bold">{{ $message }}</div>
    @enderror

      <div class="relative h-10 input-component mb-5">

        <select name="pengguna_peran" class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1">
            {{-- <option value="{{old('jabatan')}}">jabatan Kosong</option> --}}
            <option value="0">Guru</option>
            <option value="1">Murid</option>
        </select>
        <label for="peran" class="absolute left-2 transition-all bg-white px-1">
         Peran
        </label>
      </div>
      <div class="relative h-10 input-component mb-5">
        <input
          id="password"
          type="password"
          name="pengguna_password"
          class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
          @error('pengguna_password') style="border: 2px solid red;" @enderror value="{{ old('pengguna_password')}}"
        />
        <label for="address" class="absolute left-2 transition-all bg-white px-1">
          Password
        </label>
      </div>
      <div class="relative h-10 input-component mb-1">
        <input
          id="konfirmasi_password"
          type="password"
          name="pengguna_password_confirmation"
          class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
          @error('pengguna_password') style="border: 2px solid red;" @enderror value="{{ old('pengguna_password')}}"
        />
        <label for="address" class="absolute left-2 transition-all bg-white px-1">
          Konfirmasi Password
        </label>
      </div>
      @error("pengguna_password")
    <div class="ml-8 text-red-500 text-bold">{{ $message }}</div>
    @enderror

      {{-- <input type="hidden" name="penggutampilan" value='0'> --}}
      <a href="/login" class="text-sm text-black text-left font-roboto leading-normal hover:underline ">Kembali Ke Login</a>
      <div class="flex space-x-5 mt-3">
        <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold border p-2  w-2/3">
       </div >
       @if(isset($register))
            {{-- <div class="text-2xl">Login Gagal</div> --}}

            @if ($register==true)
            @php
            echo '<script type="text/javascript">
           alert("berhasil register");
           </script>';
             @endphp
            @else

            @endif
        @endif
    </div>

</form>

<style>
label {
  top: 0%;
  transform: translateY(-50%);
  font-size: 11px;
  color: rgba(37, 99, 235, 1);
}
.empty input:not(:focus) + label {
  top: 50%;
  transform: translateY(-50%);
  font-size: 14px;
}
input:not(:focus) + label {
  color: rgba(70, 70, 70, 1);
}
input {
  border-width: 1px;
}
input:focus {
  outline: none;
  border-color: rgba(37, 99, 235, 1);
}
</style>
<script>
    document.getElementById('name').value = 'John Doe'
    document.getElementById('email').value = 'john.doe@mail.com'
    document.getElementById('email').focus()
    const allInputs = document.querySelectorAll('input');
    for(const input of allInputs) {
        input.addEventListener('input', () => {
            const val = input.value
            if(!val) {
                input.parentElement.classList.add('empty')
            } else {
                input.parentElement.classList.remove('empty')
            }
        })
    }
</script>


{{-- <div class="h-screen w-auto bg-gradient-to-r from-blue-400 via-purple-500 to-white-500  mx-auto flex justify-center items-center">
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
  </div> --}}


@endsection

@section('footer')

@endsection







</body>
</html>

