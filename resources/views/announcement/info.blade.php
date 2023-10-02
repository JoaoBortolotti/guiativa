<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="pb-12">
            <div class="bg-gray-900 shadow-xl border-b border-gray-300">
                <div class=" max-w-7xl mx-auto px-4 ">
                    <div class="flex justify-between h-20">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center text-white hover:text-gray-300">
                                <a href="{{ route('home') }}">
                                    <x-application-logo class="block h-10 w-auto fill-current" />
                                </a>
                                <h3 class="pl-5 font-bold">
                                    Guiativa
                                </h3>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">

                                </x-nav-link>
                            </div>
                        </div>
                        <div class="flex">
                            @if (Route::has('login'))
                                <div class="flex items-center sm:right-20 text-right">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="font-bold text-white active:text-green-50 hover:text-gray-300 hover:cursor-pointer">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}" class="font-bold text-white hover:text-gray-300 hover:cursor-pointer">Entrar</a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="font-bold text-gray-700 hover:text-gray-300 hover:cursor-pointer">Registrar</a>
                                            @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class=" max-w-7xl m-auto">
            <div class="border border-gray-900 rounded-3xl">
                <div class="bg-gray-900 shadow-xl rounded-t-3xl p-12">
                    @if ($anuncio !== null)
                        <!--Interior-->
                        <div class="w-max m-auto flex">
                            <!--Imagem Principal do Anúncio-->
                            <div class="w-max h-fit mx-auto pr-10" id="foto_anuncio">
                                <img class="w-32 h-32 rounded-[10%] object-cover" src="/img/events/{{ $anuncio->imagem }}" alt="">
                            </div><!--Final Imagem Principal do Anúncio-->

                            <!--Nome+Estrela Anúncio-->
                            <div class="pt-2 text-white">
                                <div class="text-2xl font-semibold">{{ $anuncio->titulo }}</div>
                                <div class="text-[80%]">Desde: {{ $anuncio->created_at }}</div>
                            </div><!--Final Nome+Estrela Anúncio-->

                            <!--Iformações de Contato-->
                            <div class="pl-36 pt-10 space-y-1 text-white">
                                @php
                                    $user = $anuncio->user;
                                @endphp

                                @if ($user->contato !== null && $user->endereco !== null)
                                    <h6 class="text-sm">Telefone: {{ $user->contato->ddd }} - {{ $user->contato->celular }}</h6>
                                    <h6 class="text-sm">Endereço: {{ $user->endereco->endereco }}, nº {{ $user->endereco->numero }}</h6>
                                    <h6 class="text-sm">Email: {{ $user->email }} </h6>
                                @else
                                    <h6 class="text-sm">Telefone: </h6>
                                    <h6 class="text-sm">Endereço: </h6>
                                    <h6 class="text-sm">Email: </h6>
                                @endif
                            </div><!--Final Iformações de Contato-->
                        </div><!--Final Interior-->
                    @endif
                </div>
            <div class="pt-12 pb-20 flex justify-center">
                <div>
                    <div class="flex space-x-12 ">
                        <div class="shadow-2xl rounded-b-lg bg-white">
                            <div class="bg-gray-900 h-14 rounded-t-lg flex items-center indent-5">
                                <div class="text-white font-bold text-xl">
                                    Descrição
                                </div>
                            </div>
                            <textarea name="desc" id="desc" cols="60" rows="20" readonly class="border-none resize-none indent-10 m-5">{{ $anuncio->descricao }}</textarea>
                        </div>
                        <div class="w-60 h-72 shadow-2xl rounded-lg bg-white">
                            <div class="bg-gray-900 h-14 top-0 rounded-t-lg flex items-center indent-5">
                                <div class="text-white font-bold text-xl">
                                    Horário Comercial
                                </div>
                            </div>
                            <div class="flex justify-center pt-6">
                                @if ($user->horario != null)
                                    <ul class="">
                                        <li class="flex"><h3 class="font-bold pr-1">Segunda:</h3> {{ $user->horario->seg }}</li>
                                        <li class="flex"><h3 class="font-bold pr-1">Terça:</h3> {{ $user->horario->ter }}</li>
                                        <li class="flex"><h3 class="font-bold pr-1">Quarta:</h3> {{ $user->horario->qua }}</li>
                                        <li class="flex"><h3 class="font-bold pr-1">Quinta:</h3> {{ $user->horario->qui }}</li>
                                        <li class="flex"><h3 class="font-bold pr-1">Sexta:</h3> {{ $user->horario->sex }}</li>
                                        <li class="flex"><h3 class="font-bold pr-1">Sábado:</h3> {{ $user->horario->sab }}</li>
                                        <li class="flex"><h3 class="font-bold pr-1">Domingo:</h3> {{ $user->horario->dom }}</li>
                                    </ul>
                                @else
                                    Não há registro de Horários
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('layouts.bottom_bar')
    </body>
</html>
