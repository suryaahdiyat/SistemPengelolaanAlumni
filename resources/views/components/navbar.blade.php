<nav>
    <ul>
        <li class="border-2 {{ Request::is('beranda*') ? 'hover:bg-cyan-700 bg-cyan-500 text-white' : 'bg-white hover:border-black text-black' }} hover:shadow-lg mb-1 rounded-md text-xl cursor-pointer duration-150 text-center">
            <a href="/beranda" class="block p-2 group"><i class='mr-2 bx bxs-home'></i><span class="md:hidden">Beranda</span><span
                class="absolute top-0 px-2 py-1 ml-2 text-sm text-white transition-opacity duration-300 bg-gray-800 rounded opacity-0 left-full group-hover:opacity-100">
                Beranda
            </span></a>
        </li>
        <li class="border-2 {{ Request::is('mahasiswa*') ? 'hover:bg-cyan-700 bg-cyan-500 text-white' : 'bg-white hover:border-black text-black' }} hover:shadow-lg mb-1 rounded-md text-xl cursor-pointer duration-150 text-center">
            <a href="/mahasiswa" class="block p-2 group"><i class='mr-2 bx bxs-book-bookmark'></i><span class="md:hidden">Mahasiswa</span><span
                class="absolute top-0 px-2 py-1 ml-2 text-sm text-white transition-opacity duration-300 bg-gray-800 rounded opacity-0 left-full group-hover:opacity-100">
                Mahasiswa
            </span></a>
        </li>
        <li class="border-2 {{ Request::is('stase*') ? 'hover:bg-cyan-700 bg-cyan-500 text-white' : 'bg-white hover:border-black text-black' }} hover:shadow-lg mb-1 rounded-md text-xl cursor-pointer duration-150 text-center">
            <a href="/stase" class="block p-2 group"><i class='mr-2 bx bxs-buildings'></i><span class="md:hidden">Stase</span><span
                class="absolute top-0 px-2 py-1 ml-2 text-sm text-white transition-opacity duration-300 bg-gray-800 rounded opacity-0 left-full group-hover:opacity-100">
                Stase
            </span></a>
        </li>
        <li class="border-2 {{ Request::is('jadwal*') ? 'hover:bg-cyan-700 bg-cyan-500 text-white' : 'bg-white hover:border-black text-black' }} hover:shadow-lg mb-1 rounded-md text-xl cursor-pointer duration-150 text-center">
            <a href="/jadwal" class="block p-2 group"><i class='mr-2 bx bxs-calendar'></i><span class="md:hidden">Jadwal</span><span
                class="absolute top-0 px-2 py-1 ml-2 text-sm text-white transition-opacity duration-300 bg-gray-800 rounded opacity-0 left-full group-hover:opacity-100">
                Jadwal
            </span></a>
        </li>
        <li class="border-2 {{ Request::is('alumni*') ? 'hover:bg-cyan-700 bg-cyan-500 text-white' : 'bg-white hover:border-black text-black' }} hover:shadow-lg mb-1 rounded-md text-xl cursor-pointer duration-150 text-center">
            <a href="/alumni" class="block p-2 group"><i class='mr-2 bx bxs-graduation'></i><span class="md:hidden">Alumni</span><span
                class="absolute top-0 px-2 py-1 ml-2 text-sm text-white transition-opacity duration-300 bg-gray-800 rounded opacity-0 left-full group-hover:opacity-100">
                Alumni
            </span></a>
        </li>
        @auth         
        <li class="text-xl text-center duration-150 bg-white border-2 rounded-md cursor-pointer hover:shadow-lg hover:border-black">
            <a href="/logout" class="block p-2 group"><i class='mr-2 bx bxs-log-out'></i><span class="md:hidden">Keluar</span><span
                class="absolute top-0 px-2 py-1 ml-2 text-sm text-white transition-opacity duration-300 bg-gray-800 rounded opacity-0 left-full group-hover:opacity-100">
                Keluar
            </span></a>
        </li>
        @endauth
        @guest    
        <li class="text-xl text-center duration-150 bg-white border-2 rounded-md cursor-pointer hover:shadow-lg hover:border-black">
            <a href="/login" class="block p-2 group"><i class='mr-2 bx bxs-log-in'></i><span class="md:hidden">Masuk</span><span
                class="absolute top-0 px-2 py-1 ml-2 text-sm text-white transition-opacity duration-300 bg-gray-800 rounded opacity-0 left-full group-hover:opacity-100">
                Masuk
            </span></a>
        </li>
        @endguest
    </ul>
</nav>