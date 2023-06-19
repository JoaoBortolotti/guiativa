<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Atualizar Contato') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize as informações de contato da sua conta, certifique-se de que todas as informações estejam atualizadas') }}
        </p>
    </header>

    <form method="post" action="{{ route('contato.store_update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

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
                    <x-text-input id="celular" name="celular" type="text" class="mt-1 block w-[350px]" :value="old('celular', $user->contato->celular)" required autofocus autocomplete="celular" />
                @else
                    <x-text-input id="celular" name="celular" type="text" class="mt-1 block w-[350px]" value=" " required autofocus autocomplete="celular" />
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('celular')" />
            </div>
        </div>

        <div>
            <x-input-label for="telefone" :value="__('Telefone')" />

            @if ($user->contato !== null)
                 <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" :value="old('telefone', $user->contato->telefone)" required autofocus autocomplete="telefone" />
            @else
                 <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" value=" " required autofocus autocomplete="telefone" />
            @endif

            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
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
