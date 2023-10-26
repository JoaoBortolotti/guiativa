<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Anuncio;
use App\Models\Contato;
use App\Models\Horario_comercial;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class AnuncioController extends Controller
{

    public function view(Anuncio $anuncio, Request $request)
    {
        return view('announcement.info', ['anuncio' => $anuncio]);
    }

    public function edit(Request $request)
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
                    'imagem' => $imageName,
                ]);
            }else{
                Anuncio::create([
                    'titulo' => $request->titulo,
                    'descricao' => $request->descricao,
                    'imagem' => $imageName,
                    'user_id' => $user->id,
                ]);

            }

            if($user->contato){
                $user->contato->update([
                    'ddd' => $request->ddd,
                    'celular' => $request->celular,
                ]);
            }else{
                Contato::create([
                    'ddd' => $request->ddd,
                    'celular' => $request->celular,
                    'user_id' => $user->id,
                ]);

            }

            if($user->horario_comercial){
                $user->horario_comercial->update([
                    'dom' => $request->dom,
                    'seg' => $request->seg,
                    'ter' => $request->ter,
                    'qua' => $request->qua,
                    'qui' => $request->qui,
                    'sex' => $request->sex,
                    'sab' => $request->sab,
                ]);
            }else{
                Horario_comercial::create([
                    'dom' => $request->dom,
                    'seg' => $request->seg,
                    'ter' => $request->ter,
                    'qua' => $request->qua,
                    'qui' => $request->qui,
                    'sex' => $request->sex,
                    'sab' => $request->sab,
                    'user_id' => $user->id
                ]);
            }
        }

        return Redirect::route('anuncio.edit');
    }

    public function destroy(Request $request):RedirectResponse
    {
        $anuncio = $request->user()->anuncio;
        $anuncio->delete();
        return Redirect::to('Dashboard');
    }


}
