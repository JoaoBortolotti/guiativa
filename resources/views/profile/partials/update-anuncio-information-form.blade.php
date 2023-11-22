<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Atualizar Anuncio') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize as informações do seu anúncio, certifique-se de que todas as informações estejam atualizadas') }}
        </p>
    </header>

    <form method="post" action="{{ route('anuncio.store_update')}}" class="my-6 space-y-6 flex flex-col gap-6" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="flex flex-row items-stretch gap-6">
            <div class="flex pt-6 grow-0">
                <label id="picture" for="imagem" tabindex="0" class="w-52 h-52 rounded-lg bg-gray-300 flex justify-center items-center border-2 border-dashed border-gray-500 cursor-pointer font-sans hover:bg-gray-200 transition-colors overflow-hidden">
                    <span id="picture_span" class="object-cover"></span>
                </label>
                <input
                    type="file"
                    name="imagem"
                    accept="image/*"
                    id="imagem"
                    value="{{ !empty($anuncio) ? "/img/events/{$anuncio->imagem}" : ''}}"

                    class="max-h-[100%] hidden"
                />
                <x-input-error class="mt-2" :messages="$errors->get('imagem')" />
            </div>
            <div class="flex flex-col grow">
                <div>
                    <x-input-label for="titulo" :value="__('Título')" />
                    <x-text-input
                        id="titulo"
                        name="titulo"
                        type="text"
                        class="mt-1 block w-full"
                        value="{{ $anuncio->titulo }}"
                        autocomplete="titulo"
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
                </div>

                <div class="pt-4">
                    <x-input-label for="descricao" :value="__('Descrição')" />
                    <x-textarea-input
                        id="descricao"
                        name="descricao"
                        type="text"
                        class="mt-1 block w-full"
                         autocomplete="descricao"
                    >{!! old('descricao', $anuncio->descricao) !!}</x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
                </div>

                <div class="pt-4 space-y-6">
                    <div class="flex space-x-2">
                        <div>
                            <x-input-label for="ddd" :value="__('DDD')" />
                            <x-text-input
                                id="ddd"
                                name="ddd"
                                type="text"
                                class="mt-1 block w-20"
                                maxlength=""
                                :value="old('ddd', $anuncio->user?->contato->ddd)"
                                autocomplete="ddd"
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('ddd')" />
                        </div>
                        <div>
                            <x-input-label for="celular" :value="__('Celular')" />

                            <x-text-input
                                id="celular"
                                name="celular"
                                type="text"
                                class="mt-1 block w-full"
                                :value="old('celular', $anuncio->user?->contato->celular)"

                                autocomplete="celular"
                            />

                            <x-input-error class="mt-2" :messages="$errors->get('celular')" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-2 justify-start grow">
                @php
                    $weekDays = [
                        'dom' => 'Domingo',
                        'seg' => 'Segunda',
                        'ter' => 'Terça',
                        'qua' => 'Quarta',
                        'qui' => 'Quinta',
                        'sex' => 'Sexta',
                        'sab' => 'Sábado'
                    ];

                @endphp
                @foreach($weekDays as $weekDay => $dayName)
                    <div class="flex flex-col gap-1">
                        <x-input-label for="{{ $weekDay }}" :value="__($dayName)" />

                        <x-text-input
                            id="{{ $weekDay }}"
                            name="{{ $weekDay }}"
                            type="text"
                            :value="old($weekDay, $anuncio->horario?->$weekDay)"

                            autocomplete="{{ $weekDay }}"
                            placeholder="08h30 às 18:00 ou Fechado"
                        />

                        <x-input-error class="mt-2" :messages="$errors->get($weekDay)" />
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex items-center self-end">
            @if ($anuncio !== null)
                <x-primary-button type="submit">{{ __('Atualizar') }}</x-primary-button>
            @else
                <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
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

        @if($anuncio->exists)
            <form method="post" action="{{ route('anuncio.destroy', ['anuncio' => $anuncio])}}" class="flex items-center absolute bottom-[290px] right-[500px]" enctype="multipart/form-data>">
                @csrf
                @method('delete')
                <div>
                        <x-danger-button>{{ __('Excluir') }}</x-danger-button>
                </div>

            </form>
        @endif


</section>
