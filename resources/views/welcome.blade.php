<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'OmniManage') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Fallback for Tailwind v4 if Vite is not running -->
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <style type="text/tailwindcss">
            @theme {
                --font-sans: 'Inter', ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }
        </style>
    @endif
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-zinc-950 dark:bg-zinc-950 dark:text-zinc-50 flex flex-col min-h-screen">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 w-full border-b border-zinc-200 dark:border-zinc-800 bg-white/95 dark:bg-zinc-950/95 backdrop-blur supports-backdrop-filter:bg-white/60 dark:supports-backdrop-filter:bg-zinc-950/60">
        <div class="container mx-auto px-4 sm:px-8 h-14 flex items-center justify-between">
            <div class="flex items-center gap-6 md:gap-10">
                <a href="/" class="flex items-center space-x-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 focus-visible:ring-offset-2 dark:focus-visible:ring-zinc-300 dark:focus-visible:ring-offset-zinc-950 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                        <path d="M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3"/>
                    </svg>
                    <span class="inline-block font-bold">OmniManage</span>
                </a>
                <nav class="hidden md:flex gap-6">
                    <a href="#features" class="flex items-center text-sm font-medium text-zinc-500 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-50 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 focus-visible:ring-offset-2 dark:focus-visible:ring-zinc-300 dark:focus-visible:ring-offset-zinc-950 rounded-sm">Features</a>
                    <a href="#categories" class="flex items-center text-sm font-medium text-zinc-500 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-50 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 focus-visible:ring-offset-2 dark:focus-visible:ring-zinc-300 dark:focus-visible:ring-offset-zinc-950 rounded-sm">Categories</a>
                </nav>
            </div>
            <div class="flex items-center gap-4">
                <nav class="flex items-center gap-2">
                    <a href="#" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-white transition-colors hover:bg-zinc-100 hover:text-zinc-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 focus-visible:ring-offset-2 dark:ring-offset-zinc-950 dark:hover:bg-zinc-800 dark:hover:text-zinc-50 dark:focus-visible:ring-zinc-300 h-9 px-4 py-2">
                        Log in
                    </a>
                    <a href="#" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-white transition-colors bg-zinc-900 text-zinc-50 hover:bg-zinc-900/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 focus-visible:ring-offset-2 dark:bg-zinc-50 dark:text-zinc-900 dark:hover:bg-zinc-50/90 dark:ring-offset-zinc-950 dark:focus-visible:ring-zinc-300 h-9 px-4 py-2">
                        Get Started
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        
        <!-- Hero Section -->
        <section class="space-y-6 pb-8 pt-16 md:pb-12 md:pt-24 lg:py-32">
            <div class="container mx-auto px-4 sm:px-8 flex max-w-5xl flex-col items-center gap-4 text-center">
                <a href="#" class="inline-flex items-center rounded-full border border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-zinc-900 px-3 py-1 text-sm font-medium transition-colors hover:bg-zinc-100 dark:hover:bg-zinc-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 focus-visible:ring-offset-2 dark:focus-visible:ring-zinc-300 dark:focus-visible:ring-offset-zinc-950">
                    <span class="flex h-2 w-2 rounded-full bg-blue-600 mr-2"></span>
                    OmniManage Storefront 2.0
                </a>
                
                <h1 class="font-bold text-4xl sm:text-5xl md:text-6xl lg:text-7xl tracking-tight text-balance">
                    Explore our <br class="hidden sm:inline" />
                    <span class="text-zinc-500 dark:text-zinc-400">Categories.</span>
                </h1>
                
                <p class="max-w-2xl leading-normal text-zinc-500 dark:text-zinc-400 sm:text-xl sm:leading-8 text-balance">
                    Discover a curated selection of products and services. Everything you need, organized perfectly for your convenience and designed for seamless shopping.
                </p>
                
                <div class="space-x-4 mt-4 flex items-center">
                    <a href="#categories" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-white transition-colors bg-zinc-900 text-zinc-50 hover:bg-zinc-900/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 focus-visible:ring-offset-2 dark:bg-zinc-50 dark:text-zinc-900 dark:hover:bg-zinc-50/90 dark:ring-offset-zinc-950 dark:focus-visible:ring-zinc-300 h-11 px-8">
                        Start Browsing
                    </a>
                    <a href="#features" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-white transition-colors border border-zinc-200 bg-white hover:bg-zinc-100 hover:text-zinc-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 focus-visible:ring-offset-2 dark:border-zinc-800 dark:bg-zinc-950 dark:hover:bg-zinc-800 dark:hover:text-zinc-50 dark:ring-offset-zinc-950 dark:focus-visible:ring-zinc-300 h-11 px-8">
                        Learn More
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Grid (Shadcn Card Style) -->
        <section id="features" class="container mx-auto px-4 sm:px-8 space-y-6 bg-zinc-50 dark:bg-zinc-900/50 py-16 md:py-24 lg:py-32 w-full max-w-none border-y border-zinc-200 dark:border-zinc-800">
            <div class="mx-auto flex max-w-232 flex-col items-center space-y-4 text-center">
                <h2 class="font-bold text-3xl leading-[1.1] sm:text-3xl md:text-6xl tracking-tight">Features</h2>
                <p class="max-w-[85%] leading-normal text-zinc-500 dark:text-zinc-400 sm:text-lg sm:leading-7 text-balance">
                    This project is designed to give you the best storefront experience. Browse, click, and shop with absolute ease.
                </p>
            </div>
            
            <div class="mx-auto grid justify-center gap-4 sm:grid-cols-2 md:max-w-5xl md:grid-cols-3 pt-8">
                
                <!-- Card 1 -->
                <div class="relative overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-950 p-2 shadow-sm transition-all hover:shadow-md">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-zinc-900 dark:text-zinc-50 mb-4">
                            <circle cx="11" cy="11" r="8"/>
                            <path d="m21 21-4.3-4.3"/>
                        </svg>
                        <div class="space-y-2">
                            <h3 class="font-bold">Browse with Ease</h3>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Find exactly what you're looking for with our neatly organized category system.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="relative overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-950 p-2 shadow-sm transition-all hover:shadow-md">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-zinc-900 dark:text-zinc-50 mb-4">
                            <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"/>
                            <path d="M14 2v4a2 2 0 0 0 2 2h4"/>
                            <path d="m3 15 2 2 4-4"/>
                        </svg>
                        <div class="space-y-2">
                            <h3 class="font-bold">Detailed View</h3>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Get comprehensive details and high-quality images for every single item.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="relative overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-950 p-2 shadow-sm transition-all hover:shadow-md">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-zinc-900 dark:text-zinc-50 mb-4">
                            <path d="m5 11 4-7"/>
                            <path d="m19 11-4-7"/>
                            <path d="M2 11h20"/>
                            <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8c.9 0 1.8-.7 2-1.6l1.7-7.4"/>
                            <path d="m9 11 1 9"/>
                            <path d="M4.5 15.5h15"/>
                            <path d="m15 11-1 9"/>
                        </svg>
                        <div class="space-y-2">
                            <h3 class="font-bold">Seamless Shopping</h3>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Experience a smooth, frictionless process from discovering to your final selection.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="container mx-auto px-4 sm:px-8 py-16 md:py-24 lg:py-32">
            <div class="mx-auto flex max-w-232 flex-col items-center justify-center gap-4 text-center">
                <h2 class="font-bold text-3xl leading-[1.1] sm:text-3xl md:text-5xl tracking-tight">Ready to explore?</h2>
                <p class="max-w-[85%] leading-normal text-zinc-500 dark:text-zinc-400 sm:text-lg sm:leading-7 mb-4">
                    Jump right into our catalog and find exactly what you need.
                </p>
                <a href="#categories" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-white transition-colors bg-zinc-900 text-zinc-50 hover:bg-zinc-900/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 focus-visible:ring-offset-2 dark:bg-zinc-50 dark:text-zinc-900 dark:hover:bg-zinc-50/90 dark:ring-offset-zinc-950 dark:focus-visible:ring-zinc-300 h-11 px-8">
                    View Catalog
                </a>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="border-t border-zinc-200 dark:border-zinc-800 w-full py-6 md:py-0">
        <div class="container mx-auto px-4 sm:px-8 flex flex-col items-center justify-between gap-4 md:h-16 md:flex-row">
            <p class="text-center text-sm leading-loose text-zinc-500 dark:text-zinc-400 md:text-left">
                Built by <a href="#" class="font-medium underline underline-offset-4 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 rounded-sm">OmniManage</a>. The source code is available on GitHub.
            </p>
            <div class="flex items-center gap-4 text-sm text-zinc-500 dark:text-zinc-400">
                <a href="#" class="font-medium underline-offset-4 hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 rounded-sm">Terms</a>
                <a href="#" class="font-medium underline-offset-4 hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-zinc-950 rounded-sm">Privacy</a>
            </div>
        </div>
    </footer>

</body>
</html>
