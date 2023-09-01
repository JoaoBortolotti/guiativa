<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class AnuncioController extends Controller
{

    public function view(Anuncio $anuncio)
    {
        return view('announcement.info', ['anuncio' => $anuncio]);
    }

    public function edit(Request $request): View
    {
        return view('announcement', [
            'user' => $request->user(),
        ]);
    }

    public function store_update(Request $request)
    {
        $user = $request->user();

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->imagem;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." ; $extension;
            $request->imagem->move(public_path('img/events'), $imageName);


            if($user->anuncio){
                $user->anuncio->update([
                    'titulo' => $request->titulo,
                    'descricao' => $request->descricao,
                    'imagem' => $request->imagem,
                    'avaliacao' => $request->rating,
                ]);
            }else{
                Anuncio::create([
                    'titulo' => $request->titulo,
                    'descricao' => $request->descricao,
                    'imagem' => $imageName,
                    'avaliacao' => $request->rating,
                    'user_id' => $user->id,
                ]);

            }
        }

        return Redirect::route('dashboard');
    }
}
