<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnuncioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProfileController::class, 'index'])->name('home');
Route::get('/anuncio/{anuncio}', [AnuncioController::class, 'view'])->name('anuncio.view');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
            return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/endereco', [EnderecoController::class, 'store_update'])->name('endereco.store_update');
    Route::patch('/profile/contato', [ContatoController::class, 'store_update'])->name('contato.store_update');
    Route::patch('profile/horario', [HorarioController::class, 'store_update'])->name('horario.store_update');


    Route::get('/profile/anuncio', [AnuncioController::class, 'edit'])->name('anuncio.edit');
    Route::post('/profile/anuncio/create', [AnuncioController::class, 'store_update'])->name('anuncio.store_update');
    Route::delete('/profile/anuncio/delete',[AnuncioController::class, 'destroy'])->name('anuncio.destroy');

});



require __DIR__.'/auth.php';
