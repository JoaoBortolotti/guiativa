<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Atualizar Anuncio') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize as informações do seu anúncio, certifique-se de que todas as informações estejam atualizadas') }}
        </p>
    </header>

    <form method="post" action="{{ route('anuncio.store_update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="imagem" :value="__('Foto Principal')" />
            @if ($user->anuncio !== null)
                <x-text-input id="imagem" name="imagem" type="file" accept="image/*" class="" value="/img/events/{{ Auth::user()->anuncio->imagem }}" required autofocus autocomplete="imagem" />
            @else
                <x-text-input id="imagem" name="imagem" type="file" accept="image/*" class="" value=" " required autofocus autocomplete="imagem" />
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('imagem')" />
        </div>

        <div>
            <x-input-label for="titulo" :value="__('Título')" />
            @if ($user->anuncio !== null)
                <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" :value="old('numero', $user->anuncio->titulo) " required autofocus autocomplete="titulo" />
            @else
                <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" value=" " required autofocus autocomplete="titulo" />
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
        </div>

        <div>
            <x-input-label for="descricao" :value="__('Descrição')" />
            @if ($user->anuncio !== null)
                <x-text-input id="descricao" name="descricao" type="text" class="mt-1 block w-full" :value="old('numero', $user->anuncio->descricao)" required autofocus autocomplete="descricao" />
            @else
                <x-text-input id="descricao" name="descricao" type="text" class="mt-1 block w-full" value=" " required autofocus autocomplete="descricao" />
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
        </div>

        {{-- <div class="rating mt-1 block w-full">
            <input type="radio" name="rating" value="5" id="star5"><label for="star5"></label>
            <input type="radio" name="rating" value="4" id="star4"><label for="star4"></label>
            <input type="radio" name="rating" value="3" id="star3"><label for="star3"></label>
            <input type="radio" name="rating" value="2" id="star2"><label for="star2"></label>
            <input type="radio" name="rating" value="1" id="star1"><label for="star1"></label>
        </div> --}}

        <div class="flex items-center gap-4">
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
</section>
