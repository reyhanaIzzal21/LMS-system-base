@extends('user.layouts.app')

@section('name')
    Modul 1: Instalasi & Konfigurasi - EduSmart
@endsection

@section('style')
    <style>
        /* CSS Tambahan untuk scrollbar agar cantik */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
@endsection

@section('content')
    <div class="flex h-[calc(100vh-80px)] mt-20 bg-slate-50 overflow-hidden relative">

        <div id="mobile-overlay" class="fixed inset-0 bg-slate-900/50 z-30 hidden lg:hidden transition-opacity"
            onclick="toggleSidebar()"></div>

        {{-- sidebar --}}
        @include('user.pages.courses.widgets.sidebar')

        <main class="flex-1 flex flex-col h-full relative overflow-hidden bg-white w-full">
            {{-- mobile sidebar --}}
            @include('user.pages.courses.widgets.mobile-sidebar')

            {{-- lesson content --}}
            @include('user.pages.courses.widgets.panes.lesson-content')

            {{-- action buttons --}}
            @include('user.pages.courses.widgets.action-button')

        </main>
    </div>
@endsection

@section('script')
    <script>
        // 1. Logic untuk Mobile Sidebar (Hamburger Menu)
        function toggleSidebar() {
            const sidebar = document.getElementById('course-sidebar');
            const overlay = document.getElementById('mobile-overlay');

            // Cek apakah sidebar sedang memiliki class translate-x-full (hidden state untuk mobile)
            if (sidebar.classList.contains('-translate-x-full')) {
                // BUKA SIDEBAR
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                // TUTUP SIDEBAR
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // 2. Logic untuk Accordion (Expand/Collapse Modul)
        function toggleModule(button) {
            // Ambil elemen konten (sibling setelah button)
            const content = button.nextElementSibling;
            // Ambil icon panah di dalam button
            const icon = button.querySelector('.ph-caret-down');

            // Toggle Visibility
            if (content.classList.contains('hidden')) {
                // Buka
                content.classList.remove('hidden');
                // Putar panah ke atas (180 derajat)
                icon.classList.add('rotate-180');
            } else {
                // Tutup
                content.classList.add('hidden');
                // Kembalikan panah ke posisi semula
                icon.classList.remove('rotate-180');
            }
        }

        // 3. Logic Mark as Complete (Dummy Alert)
        const toggle = document.getElementById('mark-complete');
        toggle.addEventListener('change', function() {
            if (this.checked) {
                // Di sini nanti panggil API Laravel
                console.log('Materi selesai!');
            }
        });
    </script>
@endsection
