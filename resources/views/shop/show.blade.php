<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $product->name }}
            </h2>
            <a href="{{ route('shop') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:underline gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                {{ __('Back to Shop') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-[calc(100vh-65px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-slate-100">
                <div class="p-6 sm:p-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">

                        <!-- Left Column: Premium Image Frame -->
                        <div
                            class="relative group rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 shadow-inner">
                            <img src="{{ $product->image ? (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://placehold.co/800x600/png?text=No+Image' }}"
                                alt="{{ $product->name }}"
                                class="h-auto object-cover max-h-[480px] w-full transition-transform duration-500 group-hover:scale-105">

                            <!-- Premium Glassmorphism View Count Overlay -->
                            <div
                                class="absolute top-4 right-4 backdrop-blur-md bg-white/80 border border-white/40 px-3.5 py-1.5 rounded-full shadow-sm flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor"
                                    class="w-4 h-4 text-indigo-600 animate-pulse">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <span class="text-xs font-semibold text-gray-700">
                                    {{ number_format($product->views) }} {{ __('views') }}
                                </span>
                            </div>
                        </div>

                        <!-- Right Column: Product Information -->
                        <div class="flex flex-col h-full justify-between">
                            <div>
                                <!-- Category Badge -->
                                @if ($product->category)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100 mb-4">
                                        {{ $product->category->name }}
                                    </span>
                                @endif

                                <!-- Product Title -->
                                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">
                                    {{ $product->name }}
                                </h1>

                                <!-- Rating / views subtext -->
                                <div class="flex items-center gap-4 text-sm text-slate-500 mb-6">
                                    <span class="flex items-center gap-1">
                                        <!-- Mini View Count in Text -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        {{ number_format($product->views) }} views since launch
                                    </span>
                                </div>

                                <!-- Price Box -->
                                <div class="bg-slate-50 border border-slate-100 rounded-2xl p-5 mb-6">
                                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">
                                        {{ __('Price') }}</p>
                                    <div class="flex items-baseline gap-2">
                                        <span
                                            class="text-3xl font-black text-indigo-600">฿{{ number_format($product->price, 2) }}</span>
                                        <span class="text-sm text-slate-500">/ unit</span>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="prose prose-slate max-w-none mb-8">
                                    <h3 class="text-sm font-semibold text-slate-900 uppercase tracking-wider mb-2">
                                        {{ __('Product Description') }}</h3>
                                    <p class="text-slate-600 leading-relaxed whitespace-pre-line">
                                        {{ $product->description ?: 'No description available for this product.' }}
                                    </p>
                                </div>
                            </div>

                            <!-- Inventory and Actions -->
                            <div class="border-t border-slate-100 pt-6">
                                <!-- Inventory Status Badge -->
                                <div class="flex items-center justify-between mb-6">
                                    <span class="text-sm font-medium text-slate-500">{{ __('Availability') }}</span>
                                    @if ($product->quantity > 0)
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100 gap-1.5">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            {{ __('In Stock') }} ({{ $product->quantity }} units)
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-100 gap-1.5">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                            {{ __('Out of Stock') }}
                                        </span>
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Premium Related Products Section -->
            @if ($relatedProducts->isNotEmpty())
                <div class="mt-16">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-3">
                            <span class="p-2 bg-indigo-50 text-indigo-600 rounded-xl border border-indigo-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                            </span>
                            <div>
                                <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                                    {{ __('สินค้าจากหมวดหมู่เดียวกัน') }}
                                </h3>
                                <p class="text-xs font-medium text-slate-500 mt-0.5">
                                    {{ __('สินค้าอื่นๆ ในหมวดหมู่เดียวกัน') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Container with AlpineJS controls -->
                    <div class="relative" x-data="{
                        scrollLeft: 0,
                        maxScroll: 0,
                        updateScrollState() {
                            const el = this.$refs.carousel;
                            this.scrollLeft = el.scrollLeft;
                            this.maxScroll = el.scrollWidth - el.clientWidth;
                        },
                        scroll(direction) {
                            const el = this.$refs.carousel;
                            const scrollAmount = el.clientWidth * 0.75;
                            el.scrollBy({
                                left: direction === 'next' ? scrollAmount : -scrollAmount,
                                behavior: 'smooth'
                            });
                        }
                    }" x-init="setTimeout(() => updateScrollState(), 100);
                    window.addEventListener('resize', () => updateScrollState());">
                        <!-- Left Navigation Button (Prev) -->
                        <button x-show="scrollLeft > 5" @click="scroll('prev')"
                            class="absolute -left-5 top-1/2 -translate-y-1/2 z-10 p-3 bg-white/95 hover:bg-indigo-600 hover:text-white text-slate-700 border border-slate-200/80 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 backdrop-blur-md flex items-center justify-center focus:outline-none"
                            style="display: none;" aria-label="Previous">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </button>

                        <!-- Carousel Snap Track -->
                        <div x-ref="carousel" @scroll.debounce.50ms="updateScrollState()"
                            class="flex gap-6 overflow-x-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none] snap-x snap-mandatory scroll-smooth pb-4 px-1">
                            @foreach ($relatedProducts as $related)
                                <div
                                    class="snap-start shrink-0 w-[280px] sm:w-[300px] lg:w-[calc((100%-72px)/4)] flex flex-col">
                                    <div
                                        class="group bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-md hover:shadow-xl transition-all duration-300 flex flex-col h-full">
                                        <a href="{{ route('shop.show', $related) }}"
                                            class="relative aspect-square overflow-hidden bg-slate-50 block">
                                            <img src="{{ $related->image ? (str_starts_with($related->image, 'http') ? $related->image : asset('storage/' . $related->image)) : 'https://placehold.co/600x600/png?text=No+Image' }}"
                                                alt="{{ $related->name }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                                            <!-- View Badge -->
                                            <span
                                                class="absolute top-3 right-3 text-xs font-semibold text-gray-700 backdrop-blur-md bg-white/80 border border-white/40 px-2.5 py-1.5 rounded-full shadow-sm flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    class="w-3.5 h-3.5 text-indigo-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                {{ number_format($related->views) }}
                                            </span>
                                        </a>
                                        <div class="p-5 flex flex-col justify-between flex-grow">
                                            <div>
                                                <h4
                                                    class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors line-clamp-1 mb-1 text-base">
                                                    <a
                                                        href="{{ route('shop.show', $related) }}">{{ $related->name }}</a>
                                                </h4>
                                                <p class="text-xs text-slate-500 line-clamp-2 mb-4">
                                                    {{ $related->description ?: 'No description available.' }}
                                                </p>
                                            </div>
                                            <div
                                                class="flex items-center justify-between border-t border-slate-100 pt-3 mt-auto">
                                                <span class="text-lg font-black text-indigo-600">
                                                    ฿{{ number_format($related->price, 2) }}
                                                </span>
                                                <span
                                                    class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $related->quantity > 0 ? 'text-emerald-700 bg-emerald-50 border border-emerald-100' : 'text-rose-700 bg-rose-50 border border-rose-100' }}">
                                                    {{ $related->quantity > 0 ? __('In Stock') : __('Out of Stock') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Right Navigation Button (Next) -->
                        <button x-show="scrollLeft < maxScroll - 5" @click="scroll('next')"
                            class="absolute -right-5 top-1/2 -translate-y-1/2 z-10 p-3 bg-white/95 hover:bg-indigo-600 hover:text-white text-slate-700 border border-slate-200/80 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 backdrop-blur-md flex items-center justify-center focus:outline-none"
                            style="display: none;" aria-label="Next">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
