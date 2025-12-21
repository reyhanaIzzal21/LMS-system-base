<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSmart - Bimbel & LMS Terintegrasi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">

    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style>
        /* Custom Styles untuk detail kecil */
        .glass-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
        }
    </style>
    @yield('style')
    @stack('style')
</head>

<body class="text-gray-800 antialiased bg-slate-50">

    @include('user.layouts.header')

    @yield('content')

    @include('user.layouts.footer')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('script')
    @yield('script')
    <script>
        // 1. Navbar Scroll Effect (Glassmorphism activation)
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('glass-nav', 'shadow-sm');
                navbar.classList.remove('py-4');
                navbar.classList.add('py-2');
            } else {
                navbar.classList.remove('glass-nav', 'shadow-sm', 'py-2');
                navbar.classList.add('py-4');
            }
        });

        // 2. Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
