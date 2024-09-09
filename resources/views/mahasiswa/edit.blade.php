<x-adminLay>
    <div class="px-4 py-2 bg-white rounded shadow-lg">
        <h1 class="mt-3 mb-5 text-xl font-semibold text-center md:text-start">Tambah Data Mahasiswa</h1>
        <form action="{{ route('mahasiswa.update', $mhs->nim) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-3">
                <label for="nama"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="nama"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Nama" value="{{ old('nama') ?? $mhs->nama}}" name="nama" />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Nama
                    </span>
                </label>
                @error('nama')
                <p class="mt-1 text-xs text-rose-500">{{ $message }}*</p>
                @enderror
            </div>
            <div class="my-3">
                <label for="nim"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="nim"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="NIM" value="{{ old('nim') ?? $mhs->nim}}" name="nim" />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        NIM
                    </span>
                </label>
                @error('nim')
                <p class="mt-1 text-xs text-rose-500">{{ $message }}*</p>
                @enderror
            </div>
            <div class="my-3">
                <label for="angkatan"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="angkatan"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Angkatan" value="{{ old('angkatan') ?? $mhs->angkatan}}" name="angkatan" />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Angkatan
                    </span>
                </label>
                @error('angkatan')
                <p class="mt-1 text-xs text-rose-500">{{ $message }}*</p>
                @enderror
            </div>
            <div class="my-3">
                <label for="kelompok"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="kelompok"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Kelompok" value="{{ old('kelompok') ?? $mhs->kelompok}}" name="kelompok" />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Kelompok
                    </span>
                </label>
                @error('kelompok')
                <p class="mt-1 text-xs text-rose-500">{{ $message }}*</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full py-2 text-white duration-150 rounded hover:scale-95 md:py-4 bg-cyan-500 hover:bg-cyan-700">Ubah</button>
        </form>
    </div>
</x-adminLay>