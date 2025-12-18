<div x-show="activeTab === 'deskripsi'" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
    class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden group">
            <div class="relative aspect-video bg-slate-100 overflow-hidden">
                @if ($course->photo)
                    <img src="{{ asset('storage/' . $course->photo) }}" alt="{{ $course->title }}"
                        class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                @else
                    <div class="flex items-center justify-center h-full text-slate-400">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                @endif
                <div class="absolute top-3 left-3">
                    <span
                        class="bg-white/95 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-slate-700 shadow-sm border border-slate-100">
                        {{ $course->category->name }}
                    </span>
                </div>
            </div>
            <div class="p-5">
                <h3 class="font-bold text-slate-800 text-lg mb-1">{{ $course->title }}</h3>
                <p class="text-slate-500 text-sm mb-4">By {{ $course->user->name }}</p>

                <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                    <div>
                        <p class="text-xs text-slate-400">Price</p>
                        <p class="text-xl font-bold text-[#5d87ff]">
                            @if ($course->promotional_price)
                                <span class="text-xs text-slate-400 line-through">Rp
                                    {{ number_format($course->price, 0, ',', '.') }}</span>
                                <span class="text-lg font-bold text-[#5d87ff]">Rp
                                    {{ number_format($course->promotional_price, 0, ',', '.') }}</span>
                            @else
                                <span class="text-lg font-bold text-slate-800">
                                    {{ $course->price == 0 ? 'Free' : 'Rp ' . number_format($course->price, 0, ',', '.') }}
                                </span>
                            @endif
                        </p>
                    </div>
                    <div class="text-right">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $course->is_ready ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-800' }}">
                            {{ $course->is_ready ? 'Published' : 'Draft' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5">
            <h4 class="font-bold text-slate-800 mb-4 text-sm uppercase tracking-wide">Course Info</h4>
            <ul class="space-y-3 text-sm">
                <li class="flex justify-between">
                    <span class="text-slate-500">Type</span>
                    <span class="font-medium {{ $course->is_premium ? 'text-amber-600' : 'text-emerald-600' }}">
                        {{ $course->is_premium ? 'Premium Course' : 'Free Course' }}
                    </span>
                </li>
                <li class="flex justify-between">
                    <span class="text-slate-500">Created At</span>
                    <span class="font-medium text-slate-700">{{ $course->created_at->format('d M Y') }}</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 min-h-[500px]">
            <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                <span class="w-1.5 h-8 bg-[#5d87ff] rounded-full"></span>
                About this Course
            </h2>

            <div class="prose prose-slate max-w-none prose-img:rounded-xl prose-a:text-[#5d87ff]">
                {!! $course->description !!}
            </div>

            @if (empty(strip_tags($course->description)))
                <div class="flex flex-col items-center justify-center py-12 text-center">
                    <p class="text-slate-400 italic">No description provided yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>
