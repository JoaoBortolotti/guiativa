<?php

namespace App\Http\Controllers;

use App\Http\Requests\Anuncio\StoreAnuncioRequest;
use App\Models\Anuncio;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnuncioController extends Controller
{
    public function view(Anuncio $anuncio): View
    {
        return view('announcement.info', [
            'anuncio' => $anuncio,
        ]);
    }

    public function edit(Anuncio $anuncio): View
    {
        return view('announcement', [
            'anuncio' => $anuncio,
        ]);
    }

    public function store_update(Anuncio $anuncio, StoreAnuncioRequest $request)
    {
        $horario_controller = new HorarioController();
        $contato_controller =
            new ContatoController();
        $user = $request->user();

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->imagem;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')).'.';
            $request->imagem->move(public_path('img/events'), $imageName);

            if ($user->anuncio) {
                $user->anuncio->update([
                    'titulo' => $request->titulo,
                    'descricao' => $request->descricao,
                    'imagem' => $imageName,
                ]);
            } else {
                Anuncio::create([
                    'titulo' => $request->titulo,
                    'descricao' => $request->descricao,
                    'imagem' => $imageName,
                    'user_id' => $user->id,
                ]);

            }
        }
        $contato_controller->store_update($request);
        $horario_controller->store_update($request);

        return Redirect::route('anuncio.edit');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $anuncio = $request->user()->anuncio;
        $anuncio->delete();

        return Redirect::to('Dashboard');
    }
}
