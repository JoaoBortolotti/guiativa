<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anuncio;


class AnuncioController extends Controller
{
    public function index()
    {
        $anuncios = anuncio::all();
        $user = user::all();
    }
}
