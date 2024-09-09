<x-adminLay>
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
        <form action="" class="relative">
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
        <a href="/stase/create" class="block h-full py-2 text-sm md:text-base">Stase Baru<i
                class='mx-2 bx bx-plus-circle'></i></a>
    </div>
    <div class="flex items-center justify-between w-full gap-2 my-2">
        <a href="/stase/export"
            class="block w-1/2 p-2 text-xs text-white duration-150 bg-green-500 border rounded-md shadow-lg md:text-base hover:underline hover:translate-x-1 hover:bg-green-700"><i
                class='mr-2 bx bxs-file-export'></i>Export Data</a>
        <a href="/stase/importPage"
            class="block w-1/2 p-2 text-xs text-white duration-150 border rounded-md shadow-lg md:text-base hover:underline hover:translate-x-1 bg-slate-500 hover:bg-slate-700"><i
                class='mr-2 bx bxs-file-import'></i>Import Data</a>
    </div>
    @endauth
    @if($stase->isEmpty())
        @if($query)
            <p class="py-2 text-center">Data stase tidak ditemukan</p>
        @else
            <p class="py-2 text-center">Belum ada data stase</p>
        @endif
    @else
    <table class="w-full my-2 overflow-hidden text-center bg-white border-2 rounded-lg shadow-lg table-auto">
        <thead>
            <tr>
                <th class="px-1 py-2 text-xs border">No</th>
                <th class="px-1 py-2 text-xs border">Nama</th>
                <th class="px-1 py-2 text-xs border">Kode</th>
                <th class="px-1 py-2 text-xs border">Durasi</th>
                @auth
                    
                <th class="px-1 py-2 text-xs border">Aksi</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($stase as $s)    
            <tr>
                <td class="px-1 py-2 text-xs border">{{ $loop->iteration }}</td>
                <td class="px-1 py-2 text-xs border">{{ $s->nama_stase }}</td>
                <td class="px-1 py-2 text-xs border">{{ $s->kode_stase }}</td>
                <td class="px-1 py-2 text-xs border">{{ $s->durasi }}</td>
                @auth
                    
                <td class="px-1 py-2 text-xs border">
                    <div>
                        <a href="/stase/{{ $s->kode_stase }}/edit" class="underline duration-150 text-cyan-500 hover:text-cyan-700">ubah</a>
                        <form action="{{ route('stase.destroy', $s->kode_stase) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="underline text-rose-600 hover:text-rose-700" onclick="return confirm('Yakin ingin menghapus data stase?')">hapus</button>
                        </form>
                    </div>
                </td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $stase->links() }}
    @endif
</x-adminLay>