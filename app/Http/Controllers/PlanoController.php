<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PlanoController extends Controller
{

    public function index()
    {
        return view('plano.contrato');
    }

    public function edit(Request $request)
    {
        return view('plano.edit', [
            'user' => $request->user(),
        ]);
    }

    public function pagamento_confirmado(Request $request)
    {
        $user = $request->user();

        if ($user->plano) {
            $user->plano->update([
                'status_pagamento' => 'pago',
            ]);
        } else {
            Plano::create([
                'status_pagamento' => 'pago',
                'user_id' => $user->id,
            ]);
        }

        return Redirect::route('dashboard');
    }
}
