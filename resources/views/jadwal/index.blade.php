<x-adminlay>
    @if(session()->has('success'))
        <div role="alert" class="p-4 bg-white border border-gray-100 rounded-xl">
            <div class="flex items-start gap-4">
                <span class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
        
                <div class="flex-1">
                    <strong class="block font-medium text-gray-900"> Perubahan disimpan </strong>
        
                    <p class="mt-1 text-sm text-gray-700">{{ session('success') }}</p>
                </div>
        
                <a href="" class="text-gray-500 transition hover:text-gray-600">
                    <span class="sr-only">Dismiss popup</span>
        
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>
        </div>
    @endif
    <div class="rounded-md shadow-lg">
        <form action="{{ route('jadwal.store') }}" class="relative">
            <input type="text" name="search" id="search" placeholder="cari...." value="{{ request('search') }}"
                class="w-full p-3 focus:outline-cyan-500" autofocus>
            <button class="absolute top-0 right-0 p-3 border border-none"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg></button>
        </form>
    </div>
    @auth    
    <div
        class="w-full my-2 text-center text-white duration-150 rounded-md shadow-lg bg-cyan-500 hover:bg-cyan-700 hover:scale-95">
        <a href="/jadwal/create" class="block h-full py-2 text-sm md:text-base">Jadwal Baru<i
                class='mx-2 bx bx-plus-circle'></i></a>
    </div>
    @endauth
    @if($jadwal->isEmpty())
        {{-- @if($query)
            <p>Data jadwal tidak ditemukan</p>
        @endif --}}
        <p class="py-2 text-center">Belum ada data jadwal</p>
    @else
    <table class="w-full my-2 overflow-hidden text-center bg-white border-2 rounded-lg shadow-lg table-auto">
        <thead>
            <tr>
                <th class="px-1 py-2 text-xs border">No</th>
                <th class="px-1 py-2 text-xs border">NIM</th>
                <th class="px-1 py-2 text-xs border">Nama</th>
                {{-- <th class="px-1 py-2 text-xs border">Angkatan</th> --}}
                <th class="px-1 py-2 text-xs border">Kelompok</th>
                <th class="px-1 py-2 text-xs border">Nama Stase</th>
                <th class="px-1 py-2 text-xs border">Durasi</th>
                @auth
                    
                <th class="px-1 py-2 text-xs border">Aksi</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $j)               
            <tr>
                <td class="px-1 py-2 text-xs border">{{ $loop->iteration }}</td>
                <td class="px-1 py-2 text-xs border">{{ $j->mahasiswa->nim }}</td>
                <td class="px-1 py-2 text-xs border">{{ $j->mahasiswa->nama }}</td>
                <td class="px-1 py-2 text-xs border">{{ $j->mahasiswa->kelompok }}</td>
                <td class="px-1 py-2 text-xs border">{{ $j->stase->nama_stase }}</td>
                <td class="px-1 py-2 text-xs border">{{ $j->stase->durasi }}</td>
                @auth
                    
                <td class="px-1 py-2 text-xs border">
                    <div>
                        <a href="/jadwal/{{ $j->id }}/edit" class="underline duration-150 text-cyan-500 hover:text-cyan-700">ubah</a>
                        <form action="{{ route('jadwal.destroy', $j->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="underline text-rose-600 hover:text-rose-700" onclick="return confirm('Yakin ingin menghapus data jadwal?')">hapus</button>
                        </form>
                    </div>
                </td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $jadwal->links() }}
    @endif
</x-adminlay>