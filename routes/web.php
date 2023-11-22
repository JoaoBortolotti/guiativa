<?php

use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

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
Route::get('/anuncio/view/{anuncio}', [AnuncioController::class, 'view'])->name('anuncio.view');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->plano == null) {
            return view('dashboard');
        } elseif($user->plano->status_pagamento == 'pago' && $user?->plano->updated_at->addDays(30)->isFuture()){
            return view('dashboard');
        } elseif ( $user->plano->updated_at->addDays(30)->isPast() || $user->plano->status_pagamento == 'pendente') {
            // Se o status não for 'pago' ou a última atualização foi há menos de 30 dias
            return redirect()->route('plano.contrato');
        }

        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('/profile')->name('profile.')->group(function(){
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('update');
        Route::delete('/delete', [ProfileController::class, 'destroy'])->name('destroy');
    });

    Route::patch('/endereco', [EnderecoController::class, 'store_update'])->name('endereco.store_update');
    Route::patch('/contato', [ContatoController::class, 'store_update'])->name('contato.store_update');
    Route::patch('/horario', [HorarioController::class, 'store_update'])->name('horario.store_update');

    Route::prefix('/anuncio')->name('anuncio.')->group(function() {
        Route::get('/edit/{anuncio?}', [AnuncioController::class, 'edit'])->name('edit');
        Route::post('/edit/{anuncio?}', [AnuncioController::class, 'store_update'])->name('store_update');
        Route::delete('/destroy/{anuncio}', [AnuncioController::class, 'destroy'])->name('destroy');

    });

    Route::prefix('/plano')->name('plano.')->group(function(){
        Route::get('/contrato', [PlanoController::class, 'index'])->name('contrato');
        Route::get('/pagamento_confirmado', [PlanoController::class, 'pagamento_confirmado'])->name('pagamento');
    });

});

require __DIR__.'/auth.php';
