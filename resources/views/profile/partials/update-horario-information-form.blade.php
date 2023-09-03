<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Atualizar Horario Comercial') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize as informações de horario do seu anuncio, certifique-se de que todas as informações estejam atualizadas') }}
        </p>
    </header>

    <form method="post" action="{{ route('horario.store_update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-4 grid-rows-2">
            <div class="">
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



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'Endereço Atualizado')
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
</section>
