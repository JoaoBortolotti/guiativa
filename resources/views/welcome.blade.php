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
            <div class="bg-blue-100 shadow-xl border-b border-gray-300">
                <div class=" max-w-7xl mx-auto px-4 ">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('home') }}">
                                    <x-application-logo class="block h-10 w-auto fill-current text-gray-800" />
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">

                                </x-nav-link>
                            </div>
                        </div>
                        <div>
                            @if (Route::has('login'))
                                <div class="top-0 sm:right-20 p-6 text-right">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="font-bold text-gray-700 active:text-green-50 hover:text-gray-900 hover:cursor-pointer">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}" class="font-bold text-gray-700 hover:text-gray-900 hover:cursor-pointer">Entrar</a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="ml-4 font-bold text-gray-700 hover:text-gray-900 hover:cursor-pointer">Registrar</a>
                                            @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Aba de Busca-->
        <div class="py-12">
            <div class="mx-auto max-w-4xl">
                <div class="font-bold text-3xl">O que deseja buscar?</div>
                <div class="p-5">
                    <form action="/" method="GET">
                        <div class="flex justify-center">
                            <input type="text" name="busca" id="busca" placeholder="Digite aqui..." class="w-4/6 h-16 bg-blue-50 rounded-l-full border-gray-800 pl-8">

                            <button class="bg-gray-800 rounded-r-full h-16">
                                    <svg width="60" height="40" viewBox="0 -15 45 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M42 42L30.913 31.5322M35.8653 19.3048C35.8653 23.8943 34.0813 28.2959 30.9059 31.5411C27.7304 34.7864 23.4235 36.6096 18.9327 36.6096C14.4418 36.6096 10.1349 34.7864 6.95946 31.5411C3.78397 28.2959 2 23.8943 2 19.3048C2 14.7153 3.78397 10.3137 6.95946 7.06846C10.1349 3.82318 14.4418 2 18.9327 2C23.4235 2 27.7304 3.82318 30.9059 7.06846C34.0813 10.3137 35.8653 14.7153 35.8653 19.3048Z" stroke="white" stroke-width="4" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--Final Aba de Busca-->

        <!--foreach de Anúncios-->
        @foreach ($anuncios as $anuncio)
                <main class="mx-auto max-w-4xl pt-2">
                    <a href="{{ route('anuncio.view', ['anuncio' =>$anuncio]) }}">
                        <div class="bg-blue-50 shadow-xl rounded-t-lg p-12">
                            <!--Interior-->
                            <div class="w-max m-auto flex">
                                <!--Imagem Principal do Anúncio-->
                                <div class="w-max h-fit mx-auto pr-10" id="foto_anuncio">
                                    <img class="w-32 h-32 rounded-[10%] object-cover" src="/img/events/{{$anuncio->imagem }}" alt="">
                                </div><!--Final Imagem Principal do Anúncio-->

                                <!--Nome+Estrela Anúncio-->
                                <div class="pt-2">
                                    <div class="text-2xl font-semibold">{{$anuncio->titulo }}</div>
                                    <div class="text-[80%]">Desde: {{$anuncio->created_at }}</div>

                                </div><!--Final Nome+Estrela Anúncio-->

                                <!--Iformações de Contato-->
                                <div class="pl-36 pt-10 space-y-1">
                                    @if ($anuncio->user->contato !== null && $anuncio->user->endereco !== null)
                                        <h6 class="text-sm">Telefone: {{ $anuncio->user->contato->ddd }} - {{ $anuncio->user->contato->celular }}</h6>
                                        <h6 class="text-sm">Endereço: {{ $anuncio->user->endereco->endereco }}, nº {{ $anuncio->user->endereco->numero }}</h6>
                                        <h6 class="text-sm">Email: {{ $anuncio->user->email }} </h6>
                                    @else
                                        <h6 class="text-sm">Telefone: </h6>
                                        <h6 class="text-sm">Endereço: </h6>
                                        <h6 class="text-sm">Email: </h6>
                                    @endif
                                </div><!--Final Iformações de Contato-->
                            </div><!--Final Interior-->
                        </div>
                    </a>
                </main>
        @endforeach
    </body>
</html>
