<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContatoController extends Controller
{
    public function store_update(Request $request)
    {
        $user = $request->user();

        if ($user->contato) {
            $user->contato->update([
                'ddd' => $request->ddd,
                'celular' => $request->celular,
            ]);
        } else {
            Contato::create([
                'ddd' => $request->ddd,
                'celular' => $request->celular,
                'user_id' => $user->id,
            ]);

        }

        return Redirect::route('profile.edit');
    }
}
