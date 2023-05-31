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
            <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" :value="old('cep', $user->cep)" onblur="pesquisacep(this.value);" required autofocus autocomplete="cep"/>
            <x-input-error class="mt-2" :messages="$errors->get('cep')" />
        </div>
        <div class="flex space-x-2">
            <div>
                <x-input-label for="endereco" :value="__('Endereço')" />
                <x-text-input id="rua" name="endereco" type="text" class="mt-1 block w-[350px]" value=" " required autofocus autocomplete="endereco" />
                <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
            </div>
            <div>
                <x-input-label for="numero" :value="__('Número')" />
                <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-20" :value="old('numero', $user->numero)" required autofocus autocomplete="numero" />
                <x-input-error class="mt-2" :messages="$errors->get('numero')" />
            </div>
        </div>
        <div>
            <x-input-label for="complemento" :value="__('Complemento')" />
            <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" :value="old('complemento', $user->complemento)" required autofocus autocomplete="complemento" />
            <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
        </div>
        <div>
            <div>
                <x-input-label for="bairro" :value="__('Bairro')" />
                <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" :value="old('bairro', $user->bairro)" required autofocus autocomplete="cidade" />
                <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
            </div>
            <div>
                <x-input-label for="cidade" :value="__('Cidade')" />
                <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" :value="old('cidade', $user->cidade)" required autofocus autocomplete="cidade" />
                <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
            </div>

        </div>
        <div class="flex space-x-2">
            <div>
                <x-input-label for="pais" :value="__('País')" />
                <x-text-input id="pais" name="pais" type="text" class="mt-1 block w-[350px]" :value="old('pais', $user->pais)" required autofocus autocomplete="pais" />
                <x-input-error class="mt-2" :messages="$errors->get('pais')" />
            </div>
            <div>
                <x-input-label for="estado" :value="__('Estado')" />
                <x-text-input id="uf" name="estado" type="text" class="mt-1 block w-20" :value="old('estado', $user->estado)" required autofocus autocomplete="estado" />
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
