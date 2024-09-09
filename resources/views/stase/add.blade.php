<x-adminLay>
    <div class="px-4 py-2 bg-white rounded shadow-lg">
        <h1 class="mt-3 mb-5 text-xl font-semibold text-center md:text-start">Tambah Data Stase</h1>
        <form action="{{ route('stase.store') }}" method="POST">
            @csrf
            <div class="my-3">
                <label for="nama_stase"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="nama_stase"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Nama Stase" value="{{ old('nama_stase') }}" name="nama_stase" />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Nama Stase
                    </span>
                </label>
                @error('nama_stase')
                <p class="mt-1 text-xs text-rose-500">{{ $message }}*</p>
                @enderror
            </div>
            <div class="my-3">
                <label for="kode_stase"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="kode_stase"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Kode Stase" value="{{ old('kode_stase') }}" name="kode_stase" />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Kode Stase
                    </span>
                </label>
                @error('kode_stase')
                <p class="mt-1 text-xs text-rose-500">{{ $message }}*</p>
                @enderror
            </div>
            <div class="my-3">
                <label for="durasi"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="durasi"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Durasi" value="{{ old('durasi') }}" name="durasi" />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Durasi
                    </span>
                </label>
                @error('durasi')
                <p class="mt-1 text-xs text-rose-500">{{ $message }}*</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full py-2 text-white duration-150 rounded hover:scale-95 md:py-4 bg-cyan-500 hover:bg-cyan-700">Simpan</button>
        </form>
    </div>
</x-adminLay>