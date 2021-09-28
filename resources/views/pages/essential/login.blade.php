@extends('layout.Layout_Login')
@section('title')
    Page Login
@endsection

@section('header')


@endsection

@section('main')

<div class="flex justify-center h-screen items-center bg-gradient-to-r from-blue-800 to-blue-300 ">
    <div class='flex max-w-sm w-full h-2/3 justify-center bg-white shadow-md rounded-lg overflow-hidden mx-auto flex flex-col p-5'>
        <h3 class="text-2xl font-bold mb-4">Kelas Yuk</h3>
    <!-- This is the input component -->
    <div class="relative h-10 input-component mb-5">
        <input
          id="email"
          type="email"
          name="Email"
          class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
        />
        <label for="address" class="absolute left-2 transition-all bg-white px-1">
          Email
        </label>
      </div>
      <div class="relative h-10 input-component mb-5">
        <input
          id="password"
          type="password"
          name="password"
          class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
        />
        <label for="address" class="absolute left-2 transition-all bg-white px-1">
          Password
        </label>
      </div>

      <a href="/register" class="text-base text-black text-right font-roboto leading-normal hover:underline mb-3">belum punya akun?</a>
            <a
            href="/"
              class="bg-blue-400 py-4 text-center px-17 md:px-12 md:py-4 text-white rounded leading-tight text-xl md:text-base font-sans mt-4"
            >
              Login
          </a>

    </div>
</div>

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

{{-- <div class="bg-gradient-to-r from-blue-400 via-purple-500 to-white-500 flex h-screen">
    <div class="justify-center flex-col flex ml-auto mr-auto items-center w-full lg:w-2/3 md:w-3/5">
      <h1 class="font-bold text-4xl my-10 text-white"> Kelas Yuk! </h1>
      <h1 class="font-bold text-2xl my-10 text-white"> Halaman Login </h1>
   <form action="" class="mt-2 flex flex-col lg:w-1/2 w-8/12">
            <div class="flex flex-wrap items-stretch w-full mb-4 relative h-15 bg-white items-center rounded mb-6 pr-10">
              <div class="flex -mr-px justify-center w-15 p-4">
                <span
                  class="flex items-center leading-normal bg-white px-3 border-0 rounded rounded-r-none text-2xl text-gray-600"
                >
                  <i class="fas fa-user-circle"></i>
                </span>
              </div>
              <input
                type="Email"
                class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 border-grey-light rounded rounded-l-none px-3 self-center relative  font-roboto text-xl outline-none"
                placeholder="Email"
              />
            </div>
            <div class="flex flex-wrap items-stretch w-full relative h-15 bg-white items-center rounded mb-4">
              <div class="flex -mr-px justify-center w-15 p-4">
                <span
                  class="flex items-center leading-normal bg-white rounded rounded-r-none text-xl px-3 whitespace-no-wrap text-gray-600"
                  >
                  <i class="fas fa-lock"></i>
                    </span
                >
              </div>
              <input
                type="password"
                class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 px-3 relative self-center font-roboto text-xl outline-none"
                placeholder="Password"
              />
              <div class="flex -mr-px">
                <span
                  class="flex items-center leading-normal bg-white rounded rounded-l-none border-0 px-3 whitespace-no-wrap text-gray-600"
                  >
                  <i class="fas fa-eye-slash"></i>
                  </span>
              </div>
            </div>
            <a href="/register" class="text-base text-white text-right font-roboto leading-normal hover:underline mb-6">belum punya akun?</a>
            <a
            href="/"
              class="bg-blue-400 py-4 text-center px-17 md:px-12 md:py-4 text-white rounded leading-tight text-xl md:text-base font-sans mt-4 mb-20"
            >
              Login
          </a>
          </form>
  </div>
  </div> --}}


@endsection

@section('footer')

@endsection







</body>
</html>

