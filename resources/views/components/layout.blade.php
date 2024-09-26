<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pengelolaan Alumni</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
</head>

<body class="font-poppins">
    {{ $slot }}
    <button id="scrollBtn" onclick="scrollToTop()"
        class="fixed hidden px-4 py-2 font-bold text-white bg-blue-500 rounded-full bottom-5 right-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
        </svg>

    </button>
    <script>
        // Tampilkan tombol saat scroll ke bawah
        window.onscroll = function() {
        let scrollBtn = document.getElementById("scrollBtn");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollBtn.classList.remove("hidden");
        } else {
        scrollBtn.classList.add("hidden");
        }
        };

        // Fungsi untuk scroll ke atas
        function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>

</html>
