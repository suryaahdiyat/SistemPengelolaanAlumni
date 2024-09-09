<x-adminLay>
    <div class="px-4 py-2 bg-white rounded shadow-lg">
        <h1 class="mt-3 mb-5 text-xl font-semibold text-center md:text-start">Tambah Data Jadwal</h1>
        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf
            <h1>Data Mahasiswa</h1>
            <div class="grid w-full grid-cols-4 gap-2 my-3">
                <label for="data_mhs"
                    class="relative block col-span-3 border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="data_mhs"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="NIM Mahasiswa" value="{{ old('data_mhs') }}" />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        NIM Mahasiswa
                    </span>
                </label>
                <input type="hidden" id="mahasiswa_id" name="mahasiswa_id">
                <button id="btn_mhs" class="col-span-1 text-xs border rounded-md md:text-base">validasi</button>
                @error('mahasiswa_id')
                    <p class="mt-1 text-xs text-rose-500">Data Mahasiswa tidak boleh kosong*</p>
                @enderror
                <label for="is_valid_mhs" class="flex items-start gap-1 cursor-pointer md:gap-4">
                    <div class="">
                        <input type="checkbox" disabled class="border-gray-300 rounded" id="is_valid_mhs"
                            name="is_valid_mhs" />
                    </div>

                    <div>
                        <strong class="text-xs font-medium text-gray-900"> data valid </strong>
                    </div>
                </label>
            </div>
            <div class="my-3">
                <label for="nama"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="nama"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Nama" value="" disabled />
                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Nama
                    </span>
                </label>
            </div>
            <div class="my-3">
                <label for="kelompok"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="kelompok"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Kelompok" value="" disabled />
            
                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Kelompok
                    </span>
                </label>
            </div>
            <h1>Data Stase</h1>
            <div class="grid w-full grid-cols-4 gap-2 my-3">
                <label for="data_stase"
                    class="relative block col-span-3 border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="data_stase"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Kode Stase" value="{{ old('data_stase') }}" />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Kode Stase
                    </span>
                </label>
                <input type="hidden" id="stase_id" name="stase_id">
                <button id="btn_stase" class="col-span-1 text-xs border rounded-md md:text-base">validasi</button>
                @error('stase_id')
                <p class="mt-1 text-xs text-rose-500">Data Stase tidak boleh kosong*</p>
                @enderror
                <label for="is_valid_stase" class="flex items-start gap-1 cursor-pointer md:gap-4">
                    <div class="">
                        <input type="checkbox" disabled class="border-gray-300 rounded" id="is_valid_stase"
                            name="is_valid_stase" />
                    </div>

                    <div>
                        <strong class="text-xs font-medium text-gray-900"> data valid </strong>
                    </div>
                </label>
            </div>
            <div class="my-3">
                <label for="nama_stase"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="nama_stase"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Nama Stase" value="" disabled />
                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Nama Stase
                    </span>
                </label>
            </div>
            <div class="my-3">
                <label for="durasi"
                    class="relative block border border-gray-200 rounded-md shadow-sm focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500">
                    <input type="text" id="durasi"
                        class="w-full p-2 placeholder-transparent bg-transparent border-none peer focus:border-transparent focus:outline-none focus:ring-0"
                        placeholder="Durasi" value="" disabled />
            
                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Durasi
                    </span>
                </label>
            </div>
            <button type="submit"
                class="w-full py-2 text-white duration-150 rounded hover:scale-95 md:py-4 bg-cyan-500 hover:bg-cyan-700">Simpan</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn_mhs').on('click', function(e) {
                e.preventDefault();
    
                let nim = $('#data_mhs').val();
    
                $.ajax({
                    url: "{{ route('jadwal.validateMhs') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        nim: nim
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // Set checkbox to checked
                            $('#is_valid_mhs').prop('checked', true);
                            
                            // Populate the disabled inputs with the student's data
                            $('#nama').val(response.data.nama);
                            $('#kelompok').val(response.data.kelompok);
                            $('#mahasiswa_id').val(response.data.id);
                        } else {
                            $('#is_valid_mhs').prop('checked', false);
                            
                            // Populate the disabled inputs with the student's data
                            $('#nama').val("");
                            $('#kelompok').val("");
                            $('#mahasiswa_id').val("");
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan, coba lagi nanti.');
                    }
                });
            });
            $('#btn_stase').on('click', function(e) {
                e.preventDefault();
    
                let kode_stase = $('#data_stase').val();
    
                $.ajax({
                    url: "{{ route('jadwal.validateStase') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        kode_stase: kode_stase
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // Set checkbox to checked
                            $('#is_valid_stase').prop('checked', true);
                            
                            // Populate the disabled inputs with the student's data
                            $('#stase_id').val(response.data.id);
                            $('#nama_stase').val(response.data.nama_stase);
                            $('#durasi').val(response.data.durasi);
                        } else {
                            $('#is_valid_stase').prop('checked', false);
                            
                            // Populate the disabled inputs with the student's data
                            $('#stase_id').val("");
                            $('#nama_stase').val("");
                            $('#durasi').val("");
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan, coba lagi nanti.');
                    }
                });
            });
        });
    </script>
</x-adminLay>

{{-- baru tahap sini --}}