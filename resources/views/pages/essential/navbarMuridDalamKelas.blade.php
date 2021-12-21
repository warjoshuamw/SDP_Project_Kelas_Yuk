<div class="flex justify-between p-auto mx-2 md:px-2 border-b border-blue-500 dark:border-blue-700">
    <div id="logo" class="flex items-center">
        <img src="/seminar.png" class="w-16 h-16 p-2" alt="">
        <div class="mx-2 px-2 font-serif  dark:text-white">
            Kelas Yuk
        </div>
    </div>
    <div class="flex justify-center">
        <a href="/murid/" class="flex  hidden md:flex items-center transition-all hover:bg-gray-100 hover:bg-opacity-25 md:p-2 {{Session::get('navbarSelected')=="home"?"border-b-2 border-blue-700":""}}">
            <p class="hover:text-gray-400  transition duration-200 ease-linear px-2 dark:text-white" >Home</p>
        </a>
        <a href="/murid/kelas/{{$dataKelas->kelas_id}}/home" class="flex  hidden md:flex items-center transition-all hover:bg-gray-100 hover:bg-opacity-25 md:p-2 {{Session::get('navbarSelected')=="feed"?"border-b-2 border-blue-700":""}}">
            <p class="hover:text-gray-400  transition duration-200 ease-linear px-2 dark:text-white" >Feed</p>
        </a>
        <a href="/murid/kelas/{{$dataKelas->kelas_id}}/tugas" class="flex  hidden md:flex items-center transition-all hover:bg-gray-100 hover:bg-opacity-25 md:p-2 {{Session::get('navbarSelected')=="tugas"?"border-b-2 border-blue-700":""}}">
            <p class="hover:text-gray-400  transition duration-200 ease-linear px-2 dark:text-white" >Daftar Tugas</p>
        </a>
        <a href="/murid/kelas/{{$dataKelas->kelas_id}}/kuis" class="flex  hidden md:flex items-center transition-all hover:bg-gray-100 hover:bg-opacity-25 md:p-2 {{Session::get('navbarSelected')=="kuis"?"border-b-2 border-blue-700":""}}">
            <p class="hover:text-gray-400  transition duration-200 ease-linear px-2 dark:text-white" >Daftar Kuis</p>
        </a>
        <a href="/murid/kelas/{{$dataKelas->kelas_id}}/daftarnilai" class="flex  hidden md:flex items-center transition-all hover:bg-gray-100 hover:bg-opacity-25 md:p-2 {{Session::get('navbarSelected')=="nilai"?"border-b-2 border-blue-700":""}}">
            <p class="hover:text-gray-400  transition duration-200 ease-linear px-2 dark:text-white" >Daftar nilai</p>
        </a>

        <a href="/murid/kelas/{{$dataKelas->kelas_id}}/listMurid" class="flex  hidden md:flex items-center transition-all hover:bg-gray-100 hover:bg-opacity-25 md:p-2 {{Session::get('navbarSelected')=="murid"?"border-b-2 border-blue-700":""}}">
            <p class="hover:text-gray-400  transition duration-200 ease-linear px-2 dark:text-white" >Murid</p>
        </a>
    </div>

    <div class="flex flex-row flex-wrap justify-center gap-2 items-center">
        <div id class="flex flex-col justify-center items-center hidden md:block">
            <div class="flex justify-center items-center">
                <span class="">
                    <svg class="h-4 w-4 text-gray-700 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
                <!-- Switch Container -->
                <div id="toggler" :class="{ 'bg-cyan-700': toggleActive}" class="w-14 h-5 flex items-center bg-gray-300 rounded-full mx-3 px-1" onclick="handleToggleActive()">
                    <!-- Switch -->
                    <div id="buttonToggler" class="bg-white w-5 h-5 rounded-full shadow-md transform" :class="{ 'translate-x-7': toggleActive}"></div>
                </div>
                <span class="">
                    <svg class="h-4 w-4 text-gray-700 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </span>
            </div>
        </div>
        <div class="relative">
            <input type="checkbox" id="sortbox" class="hidden absolute">
            <label for="sortbox" class="flex flex-col items-center cursor-pointer rounded-full shadow-md bg-white w-12 h-12 text-center justify-content-center">
                <svg class="svg-icon w-10 h-10" viewBox="0 0 20 20">
                    <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                </svg>
            </label>
            <div id="sortboxmenu" class="absolute mt-1 right-1 top-full min-w-max shadow rounded-md opacity-0 bg-gray-300 border border-gray-400 transition delay-75 ease-in-out z-10">
                <ul class="block text-center text-gray-900">
                    <li><a href="/settings" class="block px-3 py-2 bg-white hover:bg-gray-200 rounded-t-md">Settings</a></li>
                    <li><a href="/logout" class="block px-3 py-2 bg-white hover:bg-gray-200 rounded-b-md">Logout</a></li>
                </ul>
            </div>
        </div>
        <style>
            #sortbox:checked ~ #sortboxmenu {
                opacity: 1;
            }
        </style>
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
    window.onload = function () {
        if(getCookie('darkmode') != null){
            handleToggleActive();
        }
    }
    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    function eraseCookie(name) {
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }
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
            eraseCookie('darkmode');
        }else{
            toggler.classList.remove('bg-gray-300');
            buttonToggler.classList.add('translate-x-7');
            toggler.classList.add('bg-blue-700');
            toggler.classList.add('darkmodeOn');
            body.classList.add('dark');
            setCookie('darkmode','true',7);
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


















