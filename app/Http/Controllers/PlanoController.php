<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;
use App\Models\User;

class PlanoController extends Controller
{
    public function index()
    {
        $planos = Plano::all();
        $users = User::all();
        return view('planos.index')->with(['planos' => $planos, 'users' => $users]);
    }

    public function create()
    {
        $planos = Plano::all();
        $users = User::all();
        return view('planos.create')->with(['planos' => $planos], ['users' => $users]);
    }

    public function store(Request $request)
    {
        Plano::create([
            'tipo' => $request->input('tipo'),
            'users_id' => $request->input('users_id')
        ]);

        return redirect()->action([PlanoController::class, 'index']);
    }

    public function edit(Plano $plano)
    {
        $planos = Plano::all();
        $users = User::all();
        return view('planos.edit', compact('planos', 'users'));
    }
}
