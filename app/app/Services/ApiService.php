<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class ApiService
{
    /**
     * Get all countries with specific fields.
     */
    public function getCountries(): Collection
    {
        $response = Http::withoutVerifying()
            ->get('https://restcountries.com/v3.1/all?fields=name,capital,population,flags');


        if ($response->successful()) {
            $priority = ['Morocco', 'Spain', 'France', 'Germany', 'Sweden', 'Brazil', 'United Kingdom', 'Japan', 'China', 'India'];
            $all = collect($response->json());
            
            // Move priority countries to the top
            return $all->filter(fn($c) => in_array($item = ($c['name']['common'] ?? ''), $priority))
                       ->values()
                       ->merge($all->filter(fn($c) => !in_array(($c['name']['common'] ?? ''), $priority))->values());
        }




        return collect([]);
    }

    /**

     * Get a specific country by name.
     */
    public function getCountryByName(string $name): Collection
    {
        $response = Http::withoutVerifying()
            ->get("https://restcountries.com/v3.1/name/{$name}?fields=name,capital,population,flags");

        if ($response->successful()) {
            return collect($response->json());
        }

        return collect([]);
    }
}

