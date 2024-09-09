<x-layout>
    <section class="bg-white">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt=""
                    {{-- src="https://images.unsplash.com/photo-1605106702734-205df224ecce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" --}}
                    src="{{ asset('img/fk_kedokteran_ulm.jpg') }}"
                    class="absolute inset-0 object-cover w-full h-full" />
            </aside>

            <main
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">
                    @if(session()->has('loginError'))
                    {{-- <p class="py-3 mb-4 text-center border rounded border-rose-500 bg-rose-200">{{ session('loginError') }}
                    </p> --}}
                    <script>
                        alert('Gagal login')
                    </script>
                    @endif
                    <a class="block text-blue-600" href="#">
                        <span class="sr-only">Home</span>
                        <img src="{{ asset('img/logo_ulm.png') }}" class="object-cover w-20 h-20" alt="">
                    </a>

                    <h1 class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                        Selamat Datang Di
                    </h1>

                    <p class="mt-4 leading-relaxed text-gray-500">
                        Sistem Pengelolaan Alumni dan Mahasiswa
                    </p>

                    <form action="" method="POST" class="grid grid-cols-6 gap-6 mt-8">
                        @csrf
                        <div class="col-span-6">
                            <label for="Email" class="block text-sm font-medium text-gray-700"> Email </label>

                            <input type="email" id="Email" name="email"
                                class="w-full p-2 mt-1 text-sm text-gray-700 bg-white border-gray-200 rounded-md shadow-sm" autofocus value="{{ old('email') }}"/>
                                @error('email')
                                <p class="mt-1 text-xs text-rose-500">{{ $message }}*</p>
                                @enderror
                        </div>

                        <div class="col-span-6">
                            <label for="Password" class="block text-sm font-medium text-gray-700"> Password </label>

                            <input type="password" id="Password" name="password"
                                class="w-full p-2 mt-1 text-sm text-gray-700 bg-white border-gray-200 rounded-md shadow-sm" />
                                @error('password')
                                <p class="mt-1 text-xs text-rose-500">{{ $message }}*</p>
                                @enderror
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button
                                class="inline-block px-12 py-3 text-sm font-medium text-white transition bg-blue-600 border border-blue-600 rounded-md shrink-0 hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                                Login
                            </button>
                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                masuk sebagai
                                <a href="/" class="text-gray-700 underline">tamu?</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-layout>