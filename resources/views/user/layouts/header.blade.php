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
                <a href="{{ route('home') }}" class="text-slate-600 hover:text-primary-600 font-medium transition">Home</a>
                <a href="{{ route('program') }}" class="text-slate-600 hover:text-primary-600 font-medium transition">Program</a>
                <a href="{{ route('courses') }}"
                    class="text-slate-600 hover:text-primary-600 font-medium transition">Course</a>
                <a href="{{ route('event') }}" class="text-slate-600 hover:text-primary-600 font-medium transition">Event</a>
                <a href="{{ route('blog') }}" class="text-slate-600 hover:text-primary-600 font-medium transition">Blog</a>
                <a href="#testimonials"
                    class="text-slate-600 hover:text-primary-600 font-medium transition">Testimoni</a>
            </div>

            <div class="hidden md:flex items-center space-x-3">
                <a href="#"
                    class="px-5 py-2.5 text-slate-700 font-semibold hover:text-primary-600 transition">Masuk</a>
                <a href="#"
                    class="px-5 py-2.5 bg-primary-600 text-white rounded-full font-semibold hover:bg-primary-700 transition shadow-lg shadow-primary-600/30">Daftar
                    Sekarang</a>
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
        <a href="#testimonials" class="block text-slate-600 font-medium">Testimoni</a>
        <div class="pt-4 border-t border-gray-100 flex flex-col gap-3">
            <a href="#"
                class="w-full text-center py-2 text-slate-700 font-semibold border border-slate-200 rounded-lg">Masuk</a>
            <a href="#" class="w-full text-center py-2 bg-primary-600 text-white rounded-lg font-semibold">Daftar
                Sekarang</a>
        </div>
    </div>
</nav>
