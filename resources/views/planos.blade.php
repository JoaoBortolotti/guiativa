<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Planos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-[1000px] shadow-2xl rounded-lg bg-white relative m-auto justify-center align-middle">
            <div class="bg-gray-300 shadow-xl h-14 inset-x-0 top-0 rounded-t-lg flex items-center indent-5">
                <div class="text-white font-bold text-xl">
                Prévia e Edição do Plano
                </div>
            </div>
            <!--Interior-->
            <form method="post" action="{{ route('plano.store_update') }}" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="py-12">
                    <div class="w-max m-auto flex">
                        <div>
                            <x-input-label for="tipo" :value="__('Tipo')" />
                            <select name="tipo" id="tipo">
                                <option value="mensal">Mensal</option>
                                <option value="anual">Anual</option>
                                <option value="bianual">Bi-Anual</option>
                                <option value="cincoanos">Cinco Anos</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('tipo')" />
                        </div>

                        <div>
                            <x-input-label for="conf_pagamento" :value="__('Status de Pagamento')" />
                            <select name="conf_pagamento" id="conf_pagamento">
                                <option value="pago">Pago</option>
                                <option value="pendente">Pendente</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('conf_pagamento')" />
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-5 right-5">
                    @php
                        $user = Auth::user();
                    @endphp
                    @if ($user->plano !== null)
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
