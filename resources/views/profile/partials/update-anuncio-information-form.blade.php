<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Atualizar Anuncio') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize as informações do seu anúncio, certifique-se de que todas as informações estejam atualizadas') }}
        </p>
    </header>

    <form method="post" action="{{ route('anuncio.store_update')}}" class="mt-6 mb-6 space-y-6 flex" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="flex justify-center pt-6">
            <label id="picture" for="imagem" tabindex="0" class="w-52 h-52 rounded-lg bg-gray-300 flex justify-center items-center border-2 border-dashed border-gray-500 cursor-pointer font-sans hover:bg-gray-200 transition-colors overflow-hidden">
                <span id="picture_span" class="object-cover"></span>
            </label>
            @if ($user->anuncio !== null)
                <input type="file" name="imagem" accept="image/*" id="imagem" value="/img/events/{{ Auth::user()->anuncio->imagem }}" required autofocus autocomplete="imagem" class="max-h-[100%] hidden">
            @else
                <input type="file" name="imagem" accept="image/*" id="imagem" value="" required autofocus autocomplete="imagem" class="max-h-[100%] hidden">
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('imagem')" />
        </div>
        <div class="pl-8 max-w-xs">
            <div>
                <x-input-label for="titulo" :value="__('Título')" />
                @if ($user->anuncio !== null)
                    <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" :value="old('numero', $user->anuncio->titulo) " required autofocus autocomplete="titulo" />
                @else
                    <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" value=" " required autofocus autocomplete="titulo" />
                @endif
                <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
            </div>

            <div class="pt-4">
                <x-input-label for="descricao" :value="__('Descrição')" />
                @if ($user->anuncio !== null)
                    <x-text-input id="descricao" name="descricao" type="text" class="mt-1 block w-full" :value="old('numero', $user->anuncio->descricao)" required autofocus autocomplete="descricao" />
                @else
                    <x-text-input id="descricao" name="descricao" type="text" class="mt-1 block w-full" value=" " required autofocus autocomplete="descricao" />
                @endif
                <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
            </div>

            <div class="pt-4 space-y-6 max-w-xs">
                <div class="flex space-x-2">
                    <div>
                        <x-input-label for="ddd" :value="__('DDD')" />

                        @if ($user->contato !== null)
                            <x-text-input id="ddd" name="ddd" type="text" class="mt-1 block w-20" :value="old('ddd', $user->contato->ddd)" required autofocus autocomplete="ddd" />
                        @else
                            <x-text-input id="ddd" name="ddd" type="text" class="mt-1 block w-20" value=" " required autofocus autocomplete="ddd" />
                        @endif

                        <x-input-error class="mt-2" :messages="$errors->get('ddd')" />
                    </div>
                    <div>
                        <x-input-label for="celular" :value="__('Celular')" />

                        @if ($user->contato !== null)
                            <x-text-input id="celular" name="celular" type="text" class="mt-1 block w-full" :value="old('celular', $user->contato->celular)" required autofocus autocomplete="celular" />
                        @else
                            <x-text-input id="celular" name="celular" type="text" class="mt-1 block w-full" value=" " required autofocus autocomplete="celular" />
                        @endif

                        <x-input-error class="mt-2" :messages="$errors->get('celular')" />
                    </div>
                </div>
            </div>
        </div>

        <div class="pl-6 grid grid-cols-2 grid-rows-3 gap-6">
            <div class="w-">
                <x-input-label for="dom" :value="__('Domingo')" />

                @if ($user->horario !== null)
                    <x-text-input id="dom" name="dom" type="text" class="mt-1 block w-20" :value="old('dom', $user->horario->dom)" required autofocus autocomplete="dom" class=""/>
                @else
                    <x-text-input id="dom" name="dom" type="text" class="mt-1 block w-20" placeholder="08h30 às 18:00 ou Fechado" required autofocus autocomplete="dom" class=""/>
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('dom')" />
            </div>
            <div>
                <x-input-label for="seg" :value="__('Segunda')" />

                @if ($user->horario !== null)
                    <x-text-input id="seg" name="seg" type="text" class="mt-1 block w-20" :value="old('seg', $user->horario->seg)" required autofocus autocomplete="seg" class=""/>
                @else
                    <x-text-input id="seg" name="seg" type="text" class="mt-1 block w-20" placeholder="08h30 às 18:00 ou Fechado" required autofocus autocomplete="seg" class=""/>
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('seg')" />
            </div>
            <div>
                <x-input-label for="ter" :value="__('Terça')" />

                @if ($user->horario !== null)
                    <x-text-input id="ter" name="ter" type="text" class="mt-1 block w-20" :value="old('ter', $user->horario->ter)" required autofocus autocomplete="ter" class=""/>
                @else
                    <x-text-input id="ter" name="ter" type="text" class="mt-1 block w-20" placeholder="08h30 às 18:00 ou Fechado" required autofocus autocomplete="ter" class=""/>
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('ter')" />
            </div>
            <div>
                <x-input-label for="qua" :value="__('Quarta')" />

                @if ($user->horario !== null)
                    <x-text-input id="qua" name="qua" type="text" class="mt-1 block w-20" :value="old('qua', $user->horario->qua)" required autofocus autocomplete="qua" class=""/>
                @else
                    <x-text-input id="qua" name="qua" type="text" class="mt-1 block w-20" placeholder="08h30 às 18:00 ou Fechado" required autofocus autocomplete="qua" class=""/>
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('qua')" />
            </div>
            <div>
                <x-input-label for="qui" :value="__('Quinta')" />

                @if ($user->horario !== null)
                    <x-text-input id="qui" name="qui" type="text" class="mt-1 block w-20" :value="old('qui', $user->horario->qui)" required autofocus autocomplete="qui" class=""/>
                @else
                    <x-text-input id="qui" name="qui" type="text" class="mt-1 block w-20" placeholder="08h30 às 18:00 ou Fechado" required autofocus autocomplete="qui" class=""/>
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('qui')" />
            </div>
            <div>
                <x-input-label for="sex" :value="__('Sexta')" />

                @if ($user->horario !== null)
                    <x-text-input id="sex" name="sex" type="text" class="mt-1 block w-20" :value="old('sex', $user->horario->sex)" required autofocus autocomplete="sex" class=""/>
                @else
                    <x-text-input id="sex" name="sex" type="text" class="mt-1 block w-20" placeholder="08h30 às 18:00 ou Fechado" required autofocus autocomplete="sex" class=""/>
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('sex')" />
            </div>
            <div>
                <x-input-label for="sab" :value="__('Sábado')" />

                @if ($user->horario !== null)
                    <x-text-input id="sab" name="sab" type="text" class="mt-1 block w-20" :value="old('sab', $user->horario->sab)" required autofocus autocomplete="sab" class=""/>
                @else
                    <x-text-input id="sab" name="sab" type="text" class="mt-1 block w-20" placeholder="08h30 às 18:00 ou Fechado" required autofocus autocomplete="sab" class=""/>
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('sab')" />
            </div>
        </div>

        <div class="flex items-center absolute bottom-[270px] right-96">
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

    <form method="post" action="{{ route('anuncio.destroy')}}" class="flex items-center absolute bottom-[270px] right-[500px]" enctype="multipart/form-data>">
        @csrf
        @method('delete')
        <div>
                <x-danger-button>{{ __('Excluir') }}</x-danger-button>
        </div>

    </form>


</section>
