<div class="flex justify-between items-center mx-10 py-4 px-10 border-b-2 border-blue-500 dark:border-blue-700">
    <div id="logo" class="flex">
        <img src="" alt="_">
        <div class="mx-2 px-2">
            Logo Disini
        </div>
    </div>
    <div id="content" class="h-full">
        <button class="flex hover:shadow-md mx-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="black">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
             </svg>
             <p class="hover:text-gray-400  transition duration-200 ease-linear px-2" >Home</p>
        </button>
    </div>
    <div class="flex items-center gap-4">
        <div id class=" h-full flex flex-col justify-center items-center">
            <div class="flex justify-center items-center">
                <span class="">
                    <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
                <!-- Switch Container -->
                <div id="toggler" :class="{ 'bg-cyan-700': toggleActive}" class="w-14 h-5 flex items-center bg-gray-300 rounded-full mx-3 px-1" onclick="handleToggleActive()">
                    <!-- Switch -->
                    <div id="buttonToggler" class="bg-white w-5 h-5 rounded-full shadow-md transform" :class="{ 'translate-x-7': toggleActive}"></div>
                </div>
                <span class="">
                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </span>
            </div>
        </div>
        <div id="logout" class="flex">
            <button class="px-4 py-2 rounded-md text-sm font-medium border-0 hover:shadow-md focus:outline-none focus:ring transition text-white dark:bg-blue-700 dark:hover:bg-blue-800 bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300">Log Out</button>
        </div>
    </div>
</div>
<script>
    let body = document.getElementById("body");
    let toggler = document.getElementById("toggler");
    let buttonToggler = document.getElementById("buttonToggler");


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
</script>
