<div class="flex justify-between items-center py-4 mx-2 md:px-10 border-b-2 border-blue-500 dark:border-blue-700">
    <div id="logo" class="flex">
        <img src="/seminar.png" class="w-6 h-6" alt="">
        <div class="mx-2 px-2 font-serif">
            Kelas Yuk
        </div>
    </div>
    <button class="flex mx-2 hidden md:flex items-center">
        <img src="/home.png" class="w-6 h-6" alt="">
         <a href="/murid/">
         <p class="hover:text-gray-400  transition duration-200 ease-linear px-2" >Home</p>
         </a>
    </button>
    <button class="flex mx-2 hidden md:flex items-center">
        <img src="/feed.png" class="w-6 h-6" alt="">
         <a href="/murid/kelas/{{$dataKelas->kelas_id}}/home">
         <p class="hover:text-gray-400  transition duration-200 ease-linear px-2" >Feed</p>
         </a>
    </button>
    <button class="flex mx-2 hidden md:flex items-center">
        <img src="/homework.png" class="w-6 h-6" alt="">
         <a href="/murid/kelas/{{$dataKelas->kelas_id}}/tugas">
         <p class="hover:text-gray-400  transition duration-200 ease-linear px-2" >Daftar Tugas</p>
         </a>
    </button>
    <button class="flex mx-2 hidden md:flex items-center">
        <img src="/quiz.png" class="w-6 h-6" alt="">
         <a href="/murid/kelas/{{$dataKelas->kelas_id}}/kuis">
         <p class="hover:text-gray-400  transition duration-200 ease-linear px-2" >Daftar Quiz</p>
         </a>
    </button>
    <button class="flex mx-2 hidden md:flex items-center">
        <img src="/grades.png" class="w-6 h-6" alt="">
         <a href="/murid/kelas/{{$dataKelas->kelas_id}}/daftarnilai">
         <p class="hover:text-gray-400  transition duration-200 ease-linear px-2" >Daftar nilai</p>
         </a>
    </button>




    <div class="flex flex-row flex-wrap gap-4 items-center">
        <div id class=" h-full flex flex-col justify-center items-center hidden md:block">
            <div class="flex justify-center items-center">
                <span class="">
                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
                <!-- Switch Container -->
                <div id="toggler" :class="{ 'bg-cyan-700': toggleActive}" class="w-14 h-5 flex items-center bg-gray-300 rounded-full mx-3 px-1" onclick="handleToggleActive()">
                    <!-- Switch -->
                    <div id="buttonToggler" class="bg-white w-5 h-5 rounded-full shadow-md transform" :class="{ 'translate-x-7': toggleActive}"></div>
                </div>
                <span class="">
                    <svg class="h-4 w-4 text-gray-400 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </span>
            </div>
        </div>
        <a href="/logout"><button class="px-4 py-2 rounded-md text-sm font-medium border-0 hover:shadow-md focus:outline-none focus:ring transition text-white dark:bg-secondary-red-hover  dark:hover:bg-secondary-red bg-secondary-red hover:bg-secondary-red-hover hidden md:block">Log Out</button></a>
    </div>
    <button type="button" onclick="openMobile()" class="bg-secondary-red dark:bg-secondary-red-hover rounded-md p-2 inline-flex items-center justify-center text-white focus:outline-none  md:hidden" aria-expanded="false">
        <span class="sr-only">Open menu</span>
        <!-- Heroicon name: outline/menu -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right hidden" id="mobile_burger">
        <div class="rounded-lg backdrop-filter backdrop-blur-2xl bg-opacity-25 shadow-lg ring-1 ring-black ring-opacity-5 bg-ocean-light  dark:bg-ocean-dark divide-y-2 divide-gray-50">
          <div class="pt-5 pb-6 px-5" >
            <div class="flex items-center justify-between">
              <span class="text-base font-medium text-white px-2">Logo Mobile</span>
              <div class="-mr-2">
                <button type="button" onclick="closeMobile()" class="bg-secondary-red dark:bg-secondary-red-hover rounded-md p-2 inline-flex items-center justify-center text-white focus:outline-none md:hidden">
                  <span class="sr-only">Close menu</span>
                  <!-- Heroicon name: outline/x -->
                  {{-- TODO-> add img --}}
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
              </div>
            </div>
            <div class="mt-6">
              <nav class="grid gap-y-8">

                <a href="/home" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                  <!-- Heroicon name: outline/cursor-click -->
                  {{-- TODO-> add img --}}
                  <span class="ml-3 text-base font-medium">
                    Home
                  </span>
                </a>
                <div id class=" h-full flex flex-col justify-center items-center">
                    <div class="flex justify-center items-center">
                        <span class="">
                            <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <!-- Switch Container -->
                        <div id="togglerMobile" :class="{ 'bg-cyan-700': toggleActive}" class="w-14 h-5 flex items-center bg-gray-300 rounded-full mx-3 px-1" onclick="handleToggleActiveMobile()">
                            <!-- Switch -->
                            <div id="buttonTogglerMobile" class="bg-white w-5 h-5 rounded-full shadow-md transform" :class="{ 'translate-x-7': toggleActive}"></div>
                        </div>
                        <span class="">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <span class="ml-3 text-base font-medium text-gray-900 ">
                <a href="/logout"><button type="button" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-secondary-red dark:bg-secondary-red-hover">Log Out</button></a>
                </span>
              </nav>
            </div>
          </div>
        </div>
      </div>
</div>
<script>
    let body = document.getElementById("body");
    let toggler = document.getElementById("toggler");
    let togglerMobile = document.getElementById("togglerMobile");
    let buttonToggler = document.getElementById("buttonToggler");
    let buttonTogglerMobile = document.getElementById("buttonTogglerMobile");

    function closeMobile() {
        var element = document.getElementById("mobile_burger");
        element.classList.add("hidden");
      }
      function openMobile() {
        var element = document.getElementById("mobile_burger");
        element.classList.remove("hidden");
      }
    function handleToggleActive(){
        if (toggler.classList.contains('darkmodeOn')) {
            toggler.classList.add('bg-gray-300');
            buttonToggler.classList.remove('translate-x-7');
            toggler.classList.remove('bg-blue-700');
            toggler.classList.remove('darkmodeOn');
            body.classList.remove('dark');
        }else{
            toggler.classList.remove('bg-gray-300');
            buttonToggler.classList.add('translate-x-7');
            toggler.classList.add('bg-blue-700');
            toggler.classList.add('darkmodeOn');
            body.classList.add('dark');
        }
    }
    function handleToggleActiveMobile(){
        if (togglerMobile.classList.contains('darkmodeOn')) {
            togglerMobile.classList.add('bg-gray-300');
            buttonTogglerMobile.classList.remove('translate-x-7');
            togglerMobile.classList.remove('bg-blue-700');
            togglerMobile.classList.remove('darkmodeOn');
            body.classList.remove('dark');
        }else{
            togglerMobile.classList.remove('bg-gray-300');
            buttonTogglerMobile.classList.add('translate-x-7');
            togglerMobile.classList.add('bg-blue-700');
            togglerMobile.classList.add('darkmodeOn');
            body.classList.add('dark');
        }
    }
</script>


















