<div id="description" class="tab-content hidden space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-sm">
        <div class="flex justify-between items-start mb-6 border-b border-slate-100 pb-4">
            <h2 class="text-xl font-bold text-slate-900">Tentang Program</h2>
        </div>

        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 prose prose-slate max-w-none text-slate-600">
                @if ($program->description)
                    {!! $program->description !!}
                @else
                    <p class="text-slate-400 italic">Belum ada deskripsi untuk program ini.</p>
                @endif
            </div>

            <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                <h3 class="font-bold text-slate-900 mb-4">Benefit Program</h3>
                @if ($program->benefits && $program->benefits->count() > 0)
                    <ul class="space-y-3">
                        @foreach ($program->benefits as $benefit)
                            <li class="flex items-start gap-3 text-sm text-slate-700">
                                <i class="ti ti-circle-check text-green-500 text-lg mt-0.5"></i>
                                <span>{{ $benefit->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-slate-400 text-sm italic">Belum ada benefit untuk program ini.</p>
                @endif
            </div>
        </div>
    </div>
</div>
