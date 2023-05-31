<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\CEP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EnderecoController extends Controller
{

    public function store_update (Request $request)
    {
        $user = $request->user();
        if($user->endereco){
            $user->endereco->update([
                'endereco' => $request->endereco,
                'bairro' => $request->bairro,
                'complemento' => $request->complemento,
                'numero' => $request->numero,
                'users_id' => $request->users_id
            ]);
            $user->endereco->cep->update([
                'cep' => $request->cep,
                'pais' => $request->pais,
                'estado' => $request->estado,
                'cidade' => $request->cidade,
            ]);
        }else{
            $endereco = Endereco::create([
                'endereco' => $request->endereco,
                'bairro' => $request->bairro,
                'complemento' => $request->complemento,
                'numero' => $request->numero,
                'users_id' => $request->users_id
            ]);
            CEP::create([
                'cep' => $request->cep,
                'pais' => $request->pais,
                'estado' => $request->estado,
                'cidade' => $request->cidade,
                'endereco_id' => $endereco->id
            ]);
        }

        return Redirect::route('profile.edit');
    }
}
