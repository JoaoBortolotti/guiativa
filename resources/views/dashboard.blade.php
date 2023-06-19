<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="mx-auto max-w-7xl py-12">
        <div class="flex space-x-7">
            <!--Painel Lateral-->
            <div class="w-[300px] flex flex-col space-y-6">
                <!--Perfil-->
                <div class="h-[300px] shadow-2xl rounded-lg bg-white relative">
                    <!--Imagem Perfil-->
                    @if (Auth::user()->anuncio->imagem ==! null)
                        <div class="w-max h-fit mx-auto pt-8" id="foto_anuncio">
                            <img class="w-28 h-28 rounded-[50%] object-cover" src="/img/events/{{ Auth::user()->anuncio->imagem }}" alt="">
                        </div>
                    @else
                        <div class="w-max h-fit mx-auto pt-8" id="foto_perfil">
                            <img class="w-28 h-28 rounded-[50%] object-cover" src="https://i.ibb.co/qJQPpJ7/4e8e96fd-e196-4433-9980-25c073e242f8.png" alt="">
                        </div>
                    @endif
                    <!--Final Imagem de Perfil-->
                    <!--Informações de Perfil-->
                    <div class="pt-5 w-max m-auto text-center">
                        <div class="text-base">{{ Auth::user()->name }}</div>
                        <div class="font-light text-xs">Desde {{ Auth::user()->created_at }}</div>
                    </div><!--Final Informações de Perfil-->
                    <div class="pt-5 w-max m-auto">
                        <x-primary-button class="ml-3">
                            <a href="{{ route('profile.edit') }}">Editar Perfil</a>
                        </x-primary-button>
                    </div>

                </div><!--Final Perfil-->

                <!--Pagamentos-->
                <div class="h-[180px] shadow-2xl rounded-lg bg-white relative">
                    <div class="bg-gray-300 shadow-xl h-10 inset-x-0 top-0 rounded-t-lg text-white font-bold text-sm flex items-center indent-5">Relatório de Pagamentos</div>

                    @if (Auth::user()->plano == null)
                        <div class="pt-10">
                            <div class="w-max m-auto">
                                <x-primary-button>
                                    <a href="{{ route('plano.edit') }}">Contratar Plano</a>
                                </x-primary-button>
                            </div>
                        </div>
                    @elseif (Auth::user()->plano->conf_pagamento == 'pago')
                        <div class="w-max m-auto flex pt-8">
                            <div class="pr-5"><img class="h-20" src="https://i.ibb.co/ZB43sBk/validando-o-bilhete.png" alt="validando-o-bilhete"></div>
                            <div class="pt-2">Pagamento <br> Confirmado</div>
                        </div>
                    @else
                        <div class="w-max m-auto flex p-6">
                            <div class="pr-6"><img class="h-20" src="https://i.ibb.co/WsxJmfN/conta.png" alt="validando-o-bilhete"></div>
                            <div class="pt-4">Pagamento <br> Pendente</div>
                        </div>
                    @endif

                </div><!--Final Pagamentos-->
            </div><!--Final Painel Lateral-->

            <!--Painel Principal-->
            <div class="w-[1000px] h-[300px] shadow-2xl rounded-lg bg-white relative">
                <div class="bg-gray-300 shadow-xl h-14 inset-x-0 top-0 rounded-t-lg flex items-center indent-5">
                    <div class="text-white font-bold text-xl">
                        Prévia e Edição do Anúncio
                    </div>
                </div>
                    @if (Auth::user()->anuncio !== null)
                        <!--Interior-->
                        <div class="w-max m-auto pt-9 flex">
                            <!--Imagem Principal do Anúncio-->
                            <div class="w-max h-fit mx-auto pr-10" id="foto_anuncio">
                                <img class="w-32 h-32 rounded-[10%] object-cover" src="/img/events/{{ Auth::user()->anuncio->imagem }}" alt="">
                            </div><!--Final Imagem Principal do Anúncio-->

                            <!--Nome+Estrela Anúncio-->
                            <div class="pt-2">
                                <div class="text-2xl font-semibold">{{ Auth::user()->anuncio->titulo }}</div>
                                <div class="text-[80%]"></div>
                                <!--Avaliação de Estrelas-->
                                <div class="pt-6">
                                    @if (Auth::user()->anuncio->avaliacao == 1)
                                        <div class="avaliacao">
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: gray;" class="">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: gray;" class="">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: gray;" class="">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: gray;" class="">&#9733;</span>
                                        </div>
                                    @elseif (Auth::user()->anuncio->avaliacao == 2)
                                        <div class="avaliacao">
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: gray;" class="">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: gray;" class="">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: gray;" class="">&#9733;</span>
                                        </div>
                                    @elseif (Auth::user()->anuncio->avaliacao == 3)
                                        <div class="avaliacao">
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: gray;" class="">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: gray;" class="">&#9733;</span>
                                        </div>
                                    @elseif (Auth::user()->anuncio->avaliacao == 4)
                                        <div class="avaliacao">
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: gray;" class="">&#9733;</span>
                                        </div>
                                    @elseif (Auth::user()->anuncio->avaliacao == 5)
                                        <div class="avaliacao">
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                            <span style="display: inline-block; font-size: 40px; color: yellow;">&#9733;</span>
                                        </div>
                                    @endif
                                </div><!--Final Avaliação de Estrelas-->
                            </div><!--Final Nome+Estrela Anúncio-->

                                <!--Iformações de Contato-->
                                <div class="pl-36 pt-10 space-y-1">
                                    @if (Auth::user()->contato !== null && Auth::user()->endereco !== null)
                                        <h6 class="text-sm">Telefone: {{ Auth::user()->contato->ddd }} - {{ Auth::user()->contato->celular }}</h6>
                                        <h6 class="text-sm">Endereço: {{ Auth::user()->endereco->endereco }}, nº {{ Auth::user()->endereco->numero }}</h6>
                                        <h6 class="text-sm">Email: {{ Auth::user()->email }} </h6>
                                    @else
                                        <h6 class="text-sm">Telefone: </h6>
                                        <h6 class="text-sm">Endereço: </h6>
                                        <h6 class="text-sm">Email: </h6>
                                    @endif
                                </div><!--Final Iformações de Contato-->
                        </div><!--Final Interior-->

                        <div class="absolute bottom-5 right-5">
                            <x-primary-button class="ml-3">
                                <a href="{{ route('anuncio.edit') }}">Editar Anúncio</a>
                            </x-primary-button>
                        </div>
                    @else
                        <div class="content-center pt-10">
                            <!--Interior-->
                            <div class="w-max m-auto pt-10 flex text-2xl">
                                Nenhum Anúncio Criado
                            </div><!--Final Interior-->
                        </div>

                        <div class="absolute bottom-5 right-5">
                            <x-primary-button class="ml-3">
                                @if (Auth::user()->plano !== null)
                                    <a href="{{ route('anuncio.edit') }}">Criar Anúncio</a>
                                @else
                                    <a href="{{ route('anuncio.edit') }}">Editar Anúncio</a>
                                @endif

                            </x-primary-button>
                        </div>
                    @endif
            </div><!--Final Painel Principal-->
        </div>
      </main>
</x-app-layout>
