<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;


class PlanoController extends Controller
{
    public function edit(Request $request): View
    {
        return view('planos', [
            'user' => $request->user(),
        ]);
    }

    public function store_update(Request $request)
    {
        $user = $request->user();

        if($user->plano){
            $user->plano->update([
                'tipo' => $request->tipo,
                'conf_pagamento' => $request->conf_pagamento,
            ]);
        }else{
            Plano::create([
                'tipo' => $request->tipo,
                'conf_pagamento' => $request->conf_pagamento,
                'user_id' => $user->id,
            ]);

        }

        return Redirect::route('dashboard');
    }
}
