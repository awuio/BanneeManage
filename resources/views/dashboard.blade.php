<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold leading-tight text-gray-800">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center gap-3">
                <a href="{{ route('products.create') }}"
                    class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-indigo-500 hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    {{ __('เพิ่มสินค้าใหม่') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50/80">

        {{-- ─── Hero Banner ─── --}}
        <div
            class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-indigo-700 to-violet-800 px-6 py-10 sm:px-10">
            {{-- Decorative circles --}}
            <div class="pointer-events-none absolute -right-16 -top-16 h-72 w-72 rounded-full bg-white/5"></div>
            <div class="pointer-events-none absolute -bottom-24 -left-12 h-64 w-64 rounded-full bg-indigo-500/30"></div>
            <div class="pointer-events-none absolute right-1/3 -bottom-8 h-40 w-40 rounded-full bg-violet-500/20"></div>

            <div class="relative max-w-7xl mx-auto flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                <div>
                    <p class="text-indigo-200 text-sm font-medium mb-1">ยินดีต้อนรับกลับมา 👋</p>
                    <h1 class="text-3xl font-black text-white tracking-tight">
                        {{ auth()->user()->name }}
                    </h1>
                    <p class="text-indigo-300 text-sm mt-2">{{ now()->locale('th')->translatedFormat('l, j F Y') }}</p>
                </div>

                {{-- Mini Summary Chips --}}
                <div class="flex flex-wrap gap-3">
                    <div
                        class="flex items-center gap-2 rounded-2xl bg-white/10 px-4 py-2.5 backdrop-blur-sm border border-white/20">
                        <span class="text-2xl font-black text-white">{{ number_format($productsCount) }}</span>
                        <span class="text-xs text-indigo-200 leading-tight">สินค้า<br>ทั้งหมด</span>
                    </div>
                    <div
                        class="flex items-center gap-2 rounded-2xl bg-white/10 px-4 py-2.5 backdrop-blur-sm border border-white/20">
                        <span class="text-2xl font-black text-emerald-300">{{ number_format($categoriesCount) }}</span>
                        <span class="text-xs text-indigo-200 leading-tight">หมวด<br>หมู่</span>
                    </div>
                    <div
                        class="flex items-center gap-2 rounded-2xl bg-white/10 px-4 py-2.5 backdrop-blur-sm border border-white/20">
                        <span class="text-2xl font-black text-amber-300">{{ number_format($postsCount) }}</span>
                        <span class="text-xs text-indigo-200 leading-tight">บทความ<br>ทั้งหมด</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

            {{-- ─── KPI Stat Cards ─── --}}
            <section class="-mt-10 relative z-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

                    {{-- Products --}}
                    <div
                        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-5 shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 cursor-default">
                        <div class="flex items-start justify-between mb-4">
                            <div
                                class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.75" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007Z" />
                                </svg>
                            </div>
                            <a href="{{ route('products.index') }}"
                                class="text-[10px] font-bold text-slate-400 hover:text-indigo-600 transition-colors opacity-0 group-hover:opacity-100">ดูทั้งหมด
                                →</a>
                        </div>
                        <p class="text-3xl font-black text-slate-900 tabular-nums">{{ number_format($productsCount) }}
                        </p>
                        <p class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-wide">สินค้าทั้งหมด</p>
                        <div
                            class="absolute -bottom-5 -right-5 h-20 w-20 rounded-full bg-indigo-50 opacity-60 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>

                    {{-- Stock Value --}}
                    <div
                        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-5 shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 cursor-default">
                        <div class="flex items-start justify-between mb-4">
                            <div
                                class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.75" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-2xl font-black text-slate-900 tabular-nums">
                            ฿{{ number_format($totalStockValue, 0) }}</p>
                        <p class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-wide">มูลค่าสต็อกรวม</p>
                        <div
                            class="absolute -bottom-5 -right-5 h-20 w-20 rounded-full bg-emerald-50 opacity-60 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>

                    {{-- Stock Alerts --}}
                    <div
                        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-5 shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 cursor-default">
                        <div class="flex items-start justify-between mb-4">
                            <div
                                class="flex h-11 w-11 items-center justify-center rounded-xl bg-rose-50 text-rose-600 group-hover:bg-rose-600 group-hover:text-white transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            @if ($outOfStockCount > 0 || $lowStockCount > 0)
                                <span
                                    class="flex items-center gap-1 text-[10px] font-bold text-rose-600 bg-rose-50 px-2 py-1 rounded-full border border-rose-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-pulse"></span>
                                    แจ้งเตือน
                                </span>
                            @endif
                        </div>
                        <p class="text-3xl font-black text-slate-900 tabular-nums">
                            {{ $outOfStockCount + $lowStockCount }}</p>
                        <p class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-wide">รายการต้องดูแล</p>
                        <div class="mt-2 flex gap-1.5 flex-wrap">
                            @if ($outOfStockCount > 0)
                                <span
                                    class="text-[10px] font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full border border-rose-100">{{ $outOfStockCount }}
                                    หมด</span>
                            @endif
                            @if ($lowStockCount > 0)
                                <span
                                    class="text-[10px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full border border-amber-100">{{ $lowStockCount }}
                                    ใกล้หมด</span>
                            @endif
                            @if ($outOfStockCount === 0 && $lowStockCount === 0)
                                <span
                                    class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100">✓
                                    ปกติดี</span>
                            @endif
                        </div>
                        <div
                            class="absolute -bottom-5 -right-5 h-20 w-20 rounded-full bg-rose-50 opacity-60 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>

                    {{-- Posts --}}
                    <div
                        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-5 shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 cursor-default">
                        <div class="flex items-start justify-between mb-4">
                            <div
                                class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.75" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                </svg>
                            </div>
                            <a href="{{ route('posts.create') }}"
                                class="text-[10px] font-bold text-slate-400 hover:text-amber-600 transition-colors opacity-0 group-hover:opacity-100">+
                                บทความ</a>
                        </div>
                        <p class="text-3xl font-black text-slate-900 tabular-nums">{{ number_format($postsCount) }}</p>
                        <p class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-wide">บทความทั้งหมด</p>
                        <div
                            class="absolute -bottom-5 -right-5 h-20 w-20 rounded-full bg-amber-50 opacity-60 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─── Top Products + Category Chart ─── --}}
            <section>
                <div class="grid grid-cols-1 xl:grid-cols-5 gap-6">

                    {{-- Top Products by Views (3/5 width) --}}
                    <div class="xl:col-span-3 rounded-2xl bg-white border border-slate-100 shadow-sm overflow-hidden">
                        <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-slate-800">สินค้ายอดนิยม</h3>
                                    <p class="text-[10px] text-slate-400">จัดอันดับตามยอดเข้าชม</p>
                                </div>
                            </div>
                            <a href="{{ route('products.index') }}"
                                class="text-xs font-semibold text-indigo-600 hover:underline">ดูทั้งหมด →</a>
                        </div>

                        @if ($topProducts->isEmpty())
                            <div class="flex flex-col items-center justify-center py-16 gap-3 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>
                                <p class="text-sm">ยังไม่มีสินค้าในระบบ</p>
                            </div>
                        @else
                            @php $maxViews = $topProducts->first()->views ?: 1; @endphp
                            <div class="divide-y divide-slate-50">
                                @foreach ($topProducts as $index => $item)
                                    <div
                                        class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50/70 transition-colors group/row">
                                        {{-- Rank --}}
                                        <span @class([
                                            'shrink-0 flex h-7 w-7 items-center justify-center rounded-full text-xs font-black',
                                            'bg-amber-400 text-white shadow-sm' => $index === 0,
                                            'bg-slate-200 text-slate-500' => $index === 1,
                                            'bg-orange-200 text-orange-700' => $index === 2,
                                            'text-slate-300' => $index > 2,
                                        ])>{{ $index + 1 }}</span>

                                        {{-- Thumbnail --}}
                                        <img src="{{ $item->image ? (str_starts_with($item->image, 'http') ? $item->image : asset('storage/' . $item->image)) : 'https://placehold.co/48x48/f8fafc/94a3b8?text=' . urlencode($index + 1) }}"
                                            alt="{{ $item->name }}"
                                            class="h-10 w-10 shrink-0 rounded-xl border border-slate-100 object-cover">

                                        {{-- Name + Bar --}}
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ route('products.edit', $item) }}"
                                                class="text-sm font-semibold text-slate-800 group-hover/row:text-indigo-600 transition-colors truncate block">
                                                {{ $item->name }}
                                            </a>
                                            <div class="mt-2 flex items-center gap-2">
                                                <div class="flex-1 h-1.5 rounded-full bg-slate-100 overflow-hidden">
                                                    <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-violet-500 transition-all duration-700"
                                                        style="width: {{ round(($item->views / $maxViews) * 100) }}%">
                                                    </div>
                                                </div>
                                                <span
                                                    class="text-[11px] text-slate-400 tabular-nums shrink-0">{{ number_format($item->views) }}
                                                    views</span>
                                            </div>
                                        </div>

                                        {{-- Price + Stock --}}
                                        <div class="text-right shrink-0">
                                            <p class="text-sm font-black text-indigo-600">
                                                ฿{{ number_format($item->price, 0) }}</p>
                                            <p
                                                class="text-[10px] font-semibold mt-0.5 {{ $item->quantity > 5 ? 'text-emerald-600' : ($item->quantity > 0 ? 'text-amber-600' : 'text-rose-600') }}">
                                                {{ $item->quantity > 0 ? $item->quantity . ' ชิ้น' : 'หมดแล้ว' }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Category Distribution (2/5 width) --}}
                    <div class="xl:col-span-2 rounded-2xl bg-white border border-slate-100 shadow-sm overflow-hidden"
                        x-data="{
                            cats: {{ json_encode($productsByCategory->map(fn($c) => ['name' => $c->name, 'count' => $c->products_count])) }},
                            colors: ['#6366f1', '#8b5cf6', '#10b981', '#f59e0b', '#ef4444', '#06b6d4'],
                            get total() { return this.cats.reduce((s, c) => s + c.count, 0) || 1 },
                            pct(n) { return Math.round((n / this.total) * 100) }
                        }">
                        <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-100">
                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-800">สัดส่วนตามหมวดหมู่</h3>
                                <p class="text-[10px] text-slate-400">จำนวนสินค้าในแต่ละหมวด</p>
                            </div>
                        </div>

                        @if ($productsByCategory->isEmpty())
                            <div class="flex flex-col items-center justify-center py-16 gap-3 text-slate-400">
                                <p class="text-sm">ยังไม่มีหมวดหมู่</p>
                            </div>
                        @else
                            <div class="p-6 space-y-5">
                                {{-- Segmented bar --}}
                                <div class="flex h-5 w-full overflow-hidden rounded-full gap-0.5">
                                    <template x-for="(c, i) in cats" :key="i">
                                        <div class="h-full transition-all duration-1000 ease-out first:rounded-l-full last:rounded-r-full"
                                            :style="`width:${pct(c.count)}%; background:${colors[i % colors.length]}`"
                                            :title="`${c.name}: ${c.count}`"></div>
                                    </template>
                                </div>

                                {{-- Legend --}}
                                <ul class="space-y-3">
                                    <template x-for="(c, i) in cats" :key="i">
                                        <li class="flex items-center gap-3">
                                            <span class="h-3 w-3 shrink-0 rounded-sm"
                                                :style="`background:${colors[i % colors.length]}`"></span>
                                            <span class="flex-1 text-sm text-slate-600 truncate"
                                                x-text="c.name"></span>
                                            <div class="flex items-center gap-2 shrink-0">
                                                <span class="text-xs font-bold text-slate-700 tabular-nums"
                                                    x-text="c.count + ' ชิ้น'"></span>
                                                <span class="text-[10px] text-slate-400 tabular-nums"
                                                    x-text="`(${pct(c.count)}%)`"></span>
                                            </div>
                                        </li>
                                    </template>
                                </ul>

                                <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-xs text-slate-400">รวมทั้งสิ้น</span>
                                    <span class="text-sm font-black text-slate-800" x-text="total + ' รายการ'"></span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            {{-- ─── Recent Products + Recent Posts ─── --}}
            <section>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    {{-- Recent Products --}}
                    <div class="rounded-2xl bg-white border border-slate-100 shadow-sm overflow-hidden">
                        <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <h3 class="text-sm font-bold text-slate-800">สินค้าที่เพิ่มล่าสุด</h3>
                            </div>
                            <a href="{{ route('products.create') }}"
                                class="inline-flex items-center gap-1 rounded-lg bg-indigo-50 px-3 py-1.5 text-xs font-bold text-indigo-600 hover:bg-indigo-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                เพิ่มสินค้า
                            </a>
                        </div>

                        @if ($recentProducts->isEmpty())
                            <div class="flex flex-col items-center justify-center py-14 text-slate-400 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-slate-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007Z" />
                                </svg>
                                <p class="text-sm">ยังไม่มีสินค้า</p>
                            </div>
                        @else
                            <ul class="divide-y divide-slate-50">
                                @foreach ($recentProducts as $product)
                                    <li
                                        class="group/item flex items-center gap-4 px-6 py-3.5 hover:bg-slate-50/80 transition-colors">
                                        <img src="{{ $product->image ? (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://placehold.co/48x48/f8fafc/94a3b8?text=P' }}"
                                            alt="{{ $product->name }}"
                                            class="h-10 w-10 shrink-0 rounded-xl border border-slate-100 object-cover">
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ route('products.edit', $product) }}"
                                                class="text-sm font-semibold text-slate-700 group-hover/item:text-indigo-600 transition-colors truncate block">
                                                {{ $product->name }}
                                            </a>
                                            <p class="text-xs text-slate-400 mt-0.5">
                                                <span class="inline-flex items-center gap-1">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-violet-400"></span>
                                                    {{ $product->category?->name ?? 'ไม่มีหมวดหมู่' }}
                                                </span>
                                                · {{ $product->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <div class="text-right shrink-0 space-y-1">
                                            <p class="text-sm font-black text-indigo-600">
                                                ฿{{ number_format($product->price, 0) }}</p>
                                            <span
                                                @class([
                                                    'inline-block text-[10px] font-bold px-2 py-0.5 rounded-full border',
                                                    'text-emerald-700 bg-emerald-50 border-emerald-100' =>
                                                        $product->quantity > 5,
                                                    'text-amber-700 bg-amber-50 border-amber-100' =>
                                                        $product->quantity > 0 && $product->quantity <= 5,
                                                    'text-rose-700 bg-rose-50 border-rose-100' => $product->quantity === 0,
                                                ])>{{ $product->quantity > 0 ? $product->quantity . ' ชิ้น' : 'หมด' }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="px-6 py-3 border-t border-slate-100">
                                <a href="{{ route('products.index') }}"
                                    class="text-xs font-semibold text-slate-400 hover:text-indigo-600 transition-colors">ดูสินค้าทั้งหมด
                                    ({{ $productsCount }}) →</a>
                            </div>
                        @endif
                    </div>

                    {{-- Recent Posts --}}
                    <div class="rounded-2xl bg-white border border-slate-100 shadow-sm overflow-hidden">
                        <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </div>
                                <h3 class="text-sm font-bold text-slate-800">บทความที่เพิ่มล่าสุด</h3>
                            </div>
                            <a href="{{ route('posts.create') }}"
                                class="inline-flex items-center gap-1 rounded-lg bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700 hover:bg-amber-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                เพิ่มบทความ
                            </a>
                        </div>

                        @if ($recentPosts->isEmpty())
                            <div class="flex flex-col items-center justify-center py-14 text-slate-400 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-slate-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                </svg>
                                <p class="text-sm">ยังไม่มีบทความ</p>
                            </div>
                        @else
                            <ul class="divide-y divide-slate-50">
                                @foreach ($recentPosts as $post)
                                    <li
                                        class="group/item flex items-start gap-4 px-6 py-3.5 hover:bg-slate-50/80 transition-colors">
                                        <div
                                            class="shrink-0 flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-amber-400 to-orange-400 font-black text-white text-base shadow-sm">
                                            {{ mb_strtoupper(mb_substr($post->title, 0, 1)) }}
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ route('posts.edit', $post) }}"
                                                class="text-sm font-semibold text-slate-700 group-hover/item:text-indigo-600 transition-colors line-clamp-1 block">
                                                {{ $post->title }}
                                            </a>
                                            <p class="text-xs text-slate-400 mt-0.5">
                                                <span class="inline-flex items-center gap-1">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                                    {{ $post->category?->name ?? 'ไม่มีหมวดหมู่' }}
                                                </span>
                                                · {{ $post->created_at->diffForHumans() }}
                                            </p>
                                            @if ($post->text)
                                                <p class="text-xs text-slate-500 line-clamp-1 mt-1">
                                                    {{ $post->text }}</p>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="px-6 py-3 border-t border-slate-100">
                                <a href="{{ route('posts.index') }}"
                                    class="text-xs font-semibold text-slate-400 hover:text-amber-600 transition-colors">ดูบทความทั้งหมด
                                    ({{ $postsCount }}) →</a>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            {{-- ─── Quick Action Shortcuts ─── --}}
            <section>
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400 mb-4">จัดการระบบ</p>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    @php
                        // Map color keys to fully explicit Tailwind class names for successful static scanning compilation
                        $colorMap = [
                            'indigo' => [
                                'border' => 'hover:border-indigo-200',
                                'bg' => 'bg-indigo-50',
                                'text' => 'text-indigo-600',
                                'hover_bg' => 'group-hover:bg-indigo-600',
                                'hover_text' => 'group-hover:text-indigo-700',
                            ],
                            'violet' => [
                                'border' => 'hover:border-violet-200',
                                'bg' => 'bg-violet-50',
                                'text' => 'text-violet-600',
                                'hover_bg' => 'group-hover:bg-violet-600',
                                'hover_text' => 'group-hover:text-violet-700',
                            ],
                            'amber' => [
                                'border' => 'hover:border-amber-200',
                                'bg' => 'bg-amber-50',
                                'text' => 'text-amber-600',
                                'hover_bg' => 'group-hover:bg-amber-600',
                                'hover_text' => 'group-hover:text-amber-700',
                            ],
                            'emerald' => [
                                'border' => 'hover:border-emerald-200',
                                'bg' => 'bg-emerald-50',
                                'text' => 'text-emerald-600',
                                'hover_bg' => 'group-hover:bg-emerald-600',
                                'hover_text' => 'group-hover:text-emerald-700',
                            ],
                        ];

                        $shortcuts = [
                            [
                                'route' => 'products.index',
                                'label' => 'จัดการสินค้า',
                                'desc' => 'เพิ่ม/แก้ไข/ลบ',
                                'color' => 'indigo',
                                'icon' =>
                                    'M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007Z',
                            ],
                            [
                                'route' => 'categories.index',
                                'label' => 'จัดการหมวดหมู่',
                                'desc' => 'หมวดสินค้า/โพสต์',
                                'color' => 'violet',
                                'icon' =>
                                    'M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z',
                            ],
                            [
                                'route' => 'posts.index',
                                'label' => 'จัดการบทความ',
                                'desc' => 'เนื้อหาและบล็อก',
                                'color' => 'amber',
                                'icon' =>
                                    'M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z',
                            ],
                            [
                                'route' => 'shop',
                                'label' => 'ดูหน้าร้านค้า',
                                'desc' => 'มุมมองลูกค้า',
                                'color' => 'emerald',
                                'icon' =>
                                    'M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z',
                            ],
                        ];
                    @endphp

                    @foreach ($shortcuts as $sc)
                        @php
                            $classes = $colorMap[$sc['color']] ?? $colorMap['indigo'];
                        @endphp
                        <a href="{{ route($sc['route']) }}"
                            class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg {{ $classes['border'] }}">
                            <span
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition-colors duration-200 {{ $classes['bg'] }} {{ $classes['text'] }} {{ $classes['hover_bg'] }} group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $sc['icon'] }}" />
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <p
                                    class="text-sm font-bold text-slate-700 transition-colors {{ $classes['hover_text'] }}">
                                    {{ $sc['label'] }}</p>
                                <p class="text-[11px] text-slate-400 mt-0.5">{{ $sc['desc'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
