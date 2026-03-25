<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\View\View;

class ApiController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Display a listing of countries data.
     */
    public function index(): View
    {
        $search = request('search');

        if ($search) {
            $data = $this->apiService->getCountryByName($search);
        } else {
            $data = $this->apiService->getCountries();
        }

        return view('index', compact('data', 'search'));
    }

}
