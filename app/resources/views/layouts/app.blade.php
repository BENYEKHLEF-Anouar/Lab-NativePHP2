<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Data</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Custom Components -->
    <script src="/js/countries.js"></script>

</head>
<body class="bg-gray-50 text-gray-900 font-sans leading-normal tracking-normal">
    <!-- Top Navigation Bar (Hidden on Mobile, Visible on Desktop) -->
    <nav class="hidden md:block bg-brand-900 text-white shadow-lg sticky top-0 z-50 py-3">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex space-x-6 items-center">
                <a class="hover:text-brand-500 transition-colors flex items-center gap-2" href="{{ route('api.data') }}">
                    <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2 2 2 0 012 2v.1c0 .667.333 1.333.6 1.7L21 16m-9-1c0-1.1.9-2 2-2h3m2 4V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h10" /></svg>
                    <span class="font-bold">Countries Explorer</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Mobile Bottom Navigation (Simplified & Compact for Countries Explorer) -->
    <div class="md:hidden fixed bottom-8 left-0 right-0 z-50 flex justify-center px-6">
        <nav class="bg-white/95 backdrop-blur-md rounded-full shadow-[0_10px_30px_rgb(0,0,0,0.15)] border border-brand-100 p-1.5 flex items-center transition-all duration-300">
            
            <!-- Countries Navigation -->
            <a href="{{ route('api.data') }}" class="flex items-center gap-3 px-6 py-2.5 rounded-full bg-brand-50 group hover:bg-brand-100 transition-all duration-300">
                <div class="flex items-center justify-center">
                    <svg class="w-6 h-6 text-brand-600 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2 2 2 0 012 2v.1c0 .667.333 1.333.6 1.7L21 16m-9-1c0-1.1.9-2 2-2h3m2 4V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h10" />
                    </svg>
                </div>
                <span class="text-sm font-bold text-brand-900 tracking-tight">Countries Explorer</span>
            </a>

        </nav>
    </div>


    <!-- Mobile Menu Toggler (Alpine logic simplified) -->
            <!-- <div class="md:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="focus:outline-none mt-4">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                        <path x-show="!open" d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path x-show="open" d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute top-16 left-0 right-0 bg-brand-900 p-4 border-t border-brand-600 block shadow-xl transition-all">
                    <a class="block py-2 text-center hover:text-brand-500" href="">🌐 Countries Explorer</a>
                </div>
            </div> -->

    <main class="min-h-screen">
        @yield('content')
    </main>



</body>
</html>
