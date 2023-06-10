<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Anúncios') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-[1000px] shadow-2xl rounded-lg bg-white relative m-auto justify-center align-middle">
            <div class="bg-gray-300 shadow-xl h-14 inset-x-0 top-0 rounded-t-lg flex items-center indent-5">
                <div class="text-white font-bold text-xl">
                Prévia e Edição do Anúncio
                </div>
            </div>
            <!--Interior-->
            <div class="pl-50">
                <form method="post" action="{{ route('anuncio.store_update') }}" class="mt-6 mx-3 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="flex py-12 m-auto">
                        <div class="max-w-1/3 pr-5">
                            <div>
                                <x-input-label for="imagem" :value="__('Foto Principal')" />
                                @if ($user->anuncio !== null)
                                    <x-text-input id="imagem" name="imagem" type="file" accept="image/*" class="w-32 h-32 rounded-[10%] object-cover" value="/img/events/{{ Auth::user()->anuncio->imagem }}" required autofocus autocomplete="imagem" />
                                @else
                                    <x-text-input id="imagem" name="imagem" type="file" accept="image/*" class="w-32 h-32 rounded-[10%] object-cover" value=" " required autofocus autocomplete="imagem" />
                                @endif
                                <x-input-error class="mt-2" :messages="$errors->get('imagem')" />
                            </div>

                        </div>
                        <div class="max-w-2/3">
                            <div>
                                <x-input-label for="titulo" :value="__('Título')" />
                                @if ($user->anuncio !== null)
                                    <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block" :value="old('numero', $user->anuncio->titulo) " required autofocus autocomplete="titulo" />
                                @else
                                    <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block" value=" " required autofocus autocomplete="titulo" />
                                @endif
                                <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
                            </div>
                            <div>
                                <x-input-label for="descricao" :value="__('Descrição')" />
                                @if ($user->anuncio !== null)
                                    <x-text-input id="descricao" name="descricao" type="text" class="mt-1 block" :value="old('numero', $user->anuncio->descricao)" required autofocus autocomplete="descricao" />
                                @else
                                    <x-text-input id="descricao" name="descricao" type="text" class="mt-1 block" value=" " required autofocus autocomplete="descricao" />
                                @endif
                                <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
                            </div>

                            <div class="rating">
                                <input type="radio" name="rating" value="5" id="star5"><label for="star5"></label>
                                <input type="radio" name="rating" value="4" id="star4"><label for="star4"></label>
                                <input type="radio" name="rating" value="3" id="star3"><label for="star3"></label>
                                <input type="radio" name="rating" value="2" id="star2"><label for="star2"></label>
                                <input type="radio" name="rating" value="1" id="star1"><label for="star1"></label>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-5 right-5">
                        @if ($user->anuncio !== null)
                            <x-primary-button>{{ __('Atualizar') }}</x-primary-button>
                        @else
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        @endif
                        @if (session('status') === 'Anúncio Atualizado')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
            </div><!--Final Interior-->


        </div><!--Final Painel Principal-->
    </div>
</x-app-layout>
