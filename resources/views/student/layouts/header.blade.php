<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-4 top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2 cursor-pointer">
                <div
                    class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center text-white text-xl font-bold">
                    E
                </div>
                <span class="text-2xl font-bold text-slate-900">EduSmart</span>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                    class="text-slate-600 hover:text-primary-600 font-medium transition">Home</a>
                <a href="{{ route('program') }}"
                    class="text-slate-600 hover:text-primary-600 font-medium transition">Program</a>
                <a href="{{ route('courses') }}"
                    class="text-slate-600 hover:text-primary-600 font-medium transition">Course</a>
                <a href="{{ route('event') }}"
                    class="text-slate-600 hover:text-primary-600 font-medium transition">Event</a>
                <a href="{{ route('blog') }}"
                    class="text-slate-600 hover:text-primary-600 font-medium transition">Blog</a>
                <a href="{{ route('testimoni') }}"
                    class="text-slate-600 hover:text-primary-600 font-medium transition">Testimoni</a>
            </div>

            <div class="hidden md:flex items-center space-x-3">

                {{-- KONDISI: BELUM LOGIN (GUEST) --}}
                @guest
                    <a href="{{ route('login') }}"
                        class="px-5 py-2.5 text-slate-700 font-semibold hover:text-primary-600 transition">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 bg-primary-600 text-white rounded-full font-semibold hover:bg-primary-700 transition shadow-lg shadow-primary-600/30">
                        Daftar Sekarang
                    </a>
                @endguest

                {{-- KONDISI: SUDAH LOGIN (AUTH) --}}
                @auth
                    {{-- Wrapper Dropdown dengan Alpine.js --}}
                    <div x-data="{ open: false }" class="relative">

                        {{-- TOMBOL TRIGGER (Nama, Role, Foto) --}}
                        <button @click="open = !open" @click.away="open = false"
                            class="flex items-center gap-3 focus:outline-none text-left">

                            {{-- Bagian Teks (Nama & Role) --}}
                            <div class="hidden md:block text-right">
                                <div class="text-sm font-bold text-slate-700">
                                    {{ Auth::user()->name }}
                                </div>

                                {{-- Logika Badge Role Spatie --}}
                                @unless (Auth::user()->hasRole('guest'))
                                    <span
                                        class="inline-block px-2 py-0.5 text-[10px] font-bold tracking-wide text-primary-600 bg-primary-100 rounded-full uppercase">
                                        {{ Auth::user()->getRoleNames()->first() }}
                                    </span>
                                @endunless
                            </div>

                            {{-- Bagian Foto Profile --}}
                            <div class="relative">
                                {{-- Menggunakan UI Avatars sebagai placeholder jika user belum upload foto --}}
                                <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=5d87ff&color=ffffff' }}"
                                    alt="Profile"
                                    class="w-10 h-10 rounded-full border-2 border-white shadow-sm object-cover">

                                {{-- Indikator Online (Opsional, pemanis visual) --}}
                                <span
                                    class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-white rounded-full"></span>
                            </div>
                        </button>

                        {{-- MENU DROPDOWN --}}
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-50 mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-1"
                            style="display: none;">

                            {{-- Header Dropdown Mobile (Opsional jika nama di hide saat mobile) --}}
                            <div class="px-4 py-3 border-b border-slate-100 md:hidden">
                                <p class="text-sm font-semibold text-slate-700">{{ Auth::user()->name }}</p>
                            </div>

                            {{-- Menu Items --}}
                            <a href="{{ url('/dashboard') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-primary-50 hover:text-primary-600 transition">
                                Dashboard
                            </a>
                            <a href="{{ url('/profile') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-primary-50 hover:text-primary-600 transition">
                                Profile
                            </a>

                            <div class="border-t border-slate-100 my-1"></div>

                            {{-- Logout Button (Harus dalam form untuk keamanan CSRF) --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth

            </div>

            <button id="mobile-menu-btn" class="md:hidden text-slate-700 text-2xl focus:outline-none">
                <i class="ph ph-list"></i>
            </button>
        </div>
    </div>

    <div id="mobile-menu"
        class="hidden md:hidden absolute top-full left-0 w-full bg-white border-b border-gray-100 shadow-xl py-4 px-4 flex-col space-y-4">
        <a href="{{ route('home') }}" class="block text-slate-600 font-medium">Home</a>
        <a href="{{ route('program') }}" class="block text-slate-600 font-medium">Program</a>
        <a href="{{ route('courses') }}" class="block text-slate-600 font-medium">Course</a>
        <a href="{{ route('event') }}" class="block text-slate-600 font-medium">Event</a>
        <a href="{{ route('blog') }}" class="block text-slate-600 font-medium">Blog</a>
        <a href="{{ route('testimoni') }}" class="block text-slate-600 font-medium">Testimoni</a>
        <div class="pt-4 border-t border-gray-100 flex flex-col gap-3">
            <a href="#"
                class="w-full text-center py-2 text-slate-700 font-semibold border border-slate-200 rounded-lg">Masuk</a>
            <a href="#" class="w-full text-center py-2 bg-primary-600 text-white rounded-lg font-semibold">Daftar
                Sekarang</a>
        </div>
    </div>
</nav>
