<x-layout>
    <header class="flex items-center justify-between p-2 bg-white shadow-lg md:p-4">
        <h1 class="text-sm md:text-xl">Sistem Pengelolaan Alumni</h1>
        <div onclick="handleMenuClick()" class="p-1 text-xs border rounded md:hidden">Menu</div>
    </header>
    <div class="relative pt-2 md:flex">
        <div class="absolute top-0 right-0 z-50 hidden w-full p-3 bg-white rounded md:w-1/12 md:block md:relative" id="d-navbar">
            <x-navbar/>
        </div>
        <div class="p-2 md:w-11/12">{{ $slot }}</div>
    </div>
    <script>
        const handleMenuClick = () => {
            console.log('btn-clicked')
            document.getElementById('d-navbar').classList.toggle('hidden')
        }
    </script>
</x-layout>