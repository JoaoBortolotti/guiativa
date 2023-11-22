<?php

namespace App\Http\Controllers;

use App\Models\Horario_comercial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HorarioController extends Controller
{
    public function store_update(Request $request)
    {
        $anuncio = $request->user()->anuncio;
        $user = $request->user();

        if ($anuncio) {
            $anuncio->horario->update([
                'dom' => $request->dom,
                'seg' => $request->seg,
                'ter' => $request->ter,
                'qua' => $request->qua,
                'qui' => $request->qui,
                'sex' => $request->sex,
                'sab' => $request->sab,
            ]);
        } else {
            Horario_comercial::create([
                'dom' => $request->dom,
                'seg' => $request->seg,
                'ter' => $request->ter,
                'qua' => $request->qua,
                'qui' => $request->qui,
                'sex' => $request->sex,
                'sab' => $request->sab,
                'user_id' => $user->id,
            ]);
        }

        return Redirect::route('dashboard');
    }
}
