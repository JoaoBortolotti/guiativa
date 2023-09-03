<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Atualizar Endereço') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize as informações de endereço da sua conta, certifique-se de que todas as informações estejam atualizadas') }}
        </p>
    </header>

    <form method="post" action="{{ route('endereco.store_update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="cep" :value="__('CEP')"/>
            @if ($user->endereco !== null)
            <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" :value="old('numero', $user->endereco->cep->cep)" {{-- onblur="pesquisacep(this.value);" --}}  required autofocus autocomplete="cep" />
        @else
            <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" value=" "  {{-- onblur="pesquisacep(this.value);" --}} required autofocus autocomplete="cep" />
        @endif
            <x-input-error class="mt-2" :messages="$errors->get('cep')" />
        </div>
        <div class="flex space-x-2">
            <div>
                <x-input-label for="endereco" :value="__('Endereço')" />

                @if ($user->endereco !== null)
                    <x-text-input id="rua" name="endereco" type="text" class="mt-1 block w-[350px]" :value="old('numero', $user->endereco->endereco)" required autofocus autocomplete="endereco" />
                @else
                    <x-text-input id="rua" name="endereco" type="text" class="mt-1 block w-[350px]" value=" " required autofocus autocomplete="endereco" />
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
            </div>
            <div>
                <x-input-label for="numero" :value="__('Número')" />

                @if ($user->endereco !== null)
                    <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-20" :value="old('numero', $user->endereco->numero)" required autofocus autocomplete="numero" />
                @else
                    <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-20" value=" " required autofocus autocomplete="numero" />
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('numero')" />
            </div>
        </div>
        <div>
            <x-input-label for="complemento" :value="__('Complemento')" />

            @if ($user->endereco !== null)
                 <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" :value="old('compemento', $user->endereco->complemento)" required autofocus autocomplete="complemento" />
            @else
                 <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" value=" " required autofocus autocomplete="complemento" />
            @endif

            <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
        </div>
        <div>
            <x-input-label for="bairro" :value="__('Bairro')" />

            @if ($user->endereco !== null)
                 <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" :value="old('bairro', $user->endereco->bairro)" required autofocus autocomplete="bairro" />
            @else
                 <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" value=" " required autofocus autocomplete="bairro" />
            @endif

            <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
        </div>
        <div>
            <x-input-label for="cidade" :value="__('Cidade')" />

            @if ($user->endereco !== null)
                 <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" :value="old('cidade', $user->endereco->cep->cidade)" required autofocus autocomplete="cidade" />
            @else
                 <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" value=" " required autofocus autocomplete="cidade" />
            @endif

            <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
        </div>
        <div class="flex space-x-2">
            <div>
                <x-input-label for="pais" :value="__('País')" />

                @if ($user->endereco !== null)
                    <x-text-input id="pais" name="pais" type="text" class="mt-1 block w-[350px]" :value="old('pais', $user->endereco->cep->pais)" required autofocus autocomplete="pais" />
                @else
                    <x-text-input id="pais" name="pais" type="text" class="mt-1 block w-[350px]" value=" " required autofocus autocomplete="pais" />
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('pais')" />
            </div>
            <div>
                <x-input-label for="estado" :value="__('Estado')" />

                @if ($user->endereco !== null)
                    <x-text-input id="uf" name="estado" type="text" class="mt-1 block w-20" :value="old('estado', $user->endereco->cep->estado)" required autofocus autocomplete="estado" />
                @else
                    <x-text-input id="uf" name="estado" type="text" class="mt-1 block w-20" value=" " required autofocus autocomplete="estado" />
                @endif

                <x-input-error class="mt-2" :messages="$errors->get('estado')" />
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
