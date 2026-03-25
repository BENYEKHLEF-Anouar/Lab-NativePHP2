@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8" 
         x-data="countryExplorer('{{ $search ?? '' }}', {{ $data->toJson() }})">
        
        <!-- Header & Search Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <h1 class="text-4xl font-extrabold text-brand-900 leading-tight">
                Explore <span class="text-brand-500">Countries</span>
            </h1>
            
            <div class="w-full md:w-1/2">
                <div class="relative flex items-center">
                    <input type="text" 
                        x-model="search"
                        class="w-full pl-4 pr-12 py-3 rounded-full border-2 border-brand-100 focus:border-brand-500 focus:outline-none shadow-sm transition-all"
                        placeholder="Search by name...">

                    
                    <div class="absolute right-4 flex items-center text-gray-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feedback & Active Search -->
        <div x-show="search" class="mb-6 flex items-center gap-2 text-gray-500" x-transition>
            <span class="bg-brand-50 text-brand-600 px-3 py-1 rounded-full text-sm font-medium">
                Searching "<span x-text="search"></span>"
            </span>
            <button @click="search = ''" class="text-xs text-brand-500 hover:underline">Clear Search</button>
        </div>

        <!-- No Results Msg -->
        <div x-show="filteredCountries().length === 0" class="bg-red-50 border-l-4 border-red-500 p-6 rounded-lg shadow-sm" x-transition>
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div class="ml-3">
                    <p class="text-red-700 font-medium text-sm">No countries found matching your search.</p>
                </div>
            </div>
        </div>

        <!-- Country Grid (Alpine Powered) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <template x-for="(item, index) in filteredCountries()" :key="item.cca3 || index">
                <div class="group bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 flex flex-col h-full"
                     @click="toggleDetails(item.cca3 || index)"
                     :class="{ 'ring-2 ring-brand-500': showDetails === (item.cca3 || index) }">

                    
                    <!-- Flag Header -->
                    <div class="relative h-48 overflow-hidden bg-gray-100">
                        <img :src="item.flags.png" 
                             :alt="'Flag of ' + item.name.common" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h2 class="text-white text-xl font-bold truncate drop-shadow-lg" x-text="item.name.common"></h2>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="p-6 flex-grow flex flex-col cursor-pointer">
                        <!-- Details Toggle (Alpine x-collapse) -->
                        <div x-show="showDetails === (item.cca3 || index)" x-collapse class="mb-4">
                            <div class="space-y-2 text-sm text-gray-600 bg-gray-50 p-4 rounded-xl border border-gray-100 shadow-inner">
                                <p><strong>Official Name:</strong><br><span x-text="item.name.official"></span></p>
                                <!-- <p><strong>Region:</strong> <span x-text="item.region"></span></p> -->
                            </div>
                        </div>

                        <!-- Info Grid -->
                        <div class="grid grid-cols-2 gap-4 mt-auto border-t border-gray-100 pt-4">
                            <div class="overflow-hidden">
                                <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold block mb-1">Capital</span>
                                <p class="text-sm font-bold truncate text-brand-900" x-text="Array.isArray(item.capital) ? item.capital.join(', ') : item.capital || 'N/A'"></p>
                            </div>
                            <div>
                                <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold block mb-1">Population</span>
                                <p class="text-sm font-bold text-brand-900" x-text="formatNumber(item.population || 0)"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
@endsection