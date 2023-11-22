<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Anuncio;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function view($uuid)
    {
        $user = User::findOrFail($uuid);

        return view('announcement.info', ['user' => $user]);
    }

    public function index(Request $request)
    {
        $query = Anuncio::with(['user.contato', 'user.plano']);
        if (! empty($termo = $request->query('busca', null))) {
            $termo = Str::lower($termo);
            $query = $query->where('titulo', 'LIKE', "%$termo%")
                ->orWhere('descricao', 'LIKE', "%$termo%");
        }

        $query = $query->whereHas('user.plano', function ($q) {
            $q->where('status_pagamento', 'pago');
        });

        return view('welcome', ['anuncios' => $query->get()]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
