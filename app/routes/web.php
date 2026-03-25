<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/api-data', [ApiController::class, 'index'])->name('api.data');

// For NativePHP
Route::get('/', [ApiController::class, 'index'])->name('api.data');

