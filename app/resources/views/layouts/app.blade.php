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
    <nav class="bg-brand-900 text-white shadow-lg sticky top-0 z-50 py-3">
        <div class="container mx-auto px-4 flex justify-between items-center">
            
            <div class="hidden md:flex space-x-6">
                <a class="hover:text-brand-500 transition-colors" href="">🌐 Countries</a>
            </div>

            <!-- Mobile Menu Toggler (Alpine logic simplified) -->
            <div class="md:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="focus:outline-none mt-4">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                        <path x-show="!open" d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path x-show="open" d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute top-16 left-0 right-0 bg-brand-900 p-4 border-t border-brand-600 block shadow-xl transition-all">
                    <a class="block py-2 text-center hover:text-brand-500" href="">🌐 Countries Explorer</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="min-h-screen">
        @yield('content')
    </main>



</body>
</html>
