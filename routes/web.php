<?php

use App\Http\Livewire\Productos;
use App\Http\Livewire\Games;
use App\Http\Livewire\Movies;
use App\Http\Livewire\Inventarios;
use App\Http\Livewire\Trabajos;
use App\Http\Livewire\Animes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('productos',Productos::class);
    Route::get('games',Games::class);
    Route::get('movies',Movies::class);
    Route::get('inventarios',Inventarios::class);
    Route::get('trabajos',Trabajos::class);
    Route::get('animes',Animes::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});