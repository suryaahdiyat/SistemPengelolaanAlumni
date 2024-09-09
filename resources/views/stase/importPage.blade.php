<x-adminLay>
    <div class="px-4 py-2 bg-white rounded shadow-lg">
        <h1 class="mt-3 mb-5 text-xl font-semibold text-center md:text-start">Import Data Stase</h1>
        <form action="{{ route('stase.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-3">
                <label for="data_stase"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="file" id="data_stase"
                        class="w-full p-4 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Data Stase" value="{{ old('data_stase') }}" name="data_stase" />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Data Stase
                    </span>
                </label>
                @error('data_stase')
                <p class="mt-1 text-xs text-rose-500">{{ $message }}*</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full py-2 text-white duration-150 rounded hover:scale-95 md:py-4 bg-cyan-500 hover:bg-cyan-700">Simpan</button>
        </form>
    </div>
</x-adminLay>