@php
    $list_ben = [
        "Anúncio Liberado",
        "Página de Detalhes",
        "Referência de Localização",
        "Horário de Trabalho",
        "Imagem de Logo",
        "Contatos",
    ]
@endphp

<x-app-layout>
    <main>
        <div class="pt-12 m-auto max-w-[400px]">
            <div class="h-[550px] shadow-2xl rounded-lg bg-gray-100 relative">
                <div class="flex flex-col justify-center align-middle items-center">
                    <div class="pt-12 text-3xl text-black font-bold">
                        Plano Mensal
                    </div>
                    <div class="text-gray-600 font-light">
                        Anúncio Liberado/Dados Completos
                    </div>
                    <div class="pt-8 text-4xl text-black font-bold">
                        R$ 54,90/mês
                    </div>
                    <section class="pt-10">
                        @foreach ($list_ben as $list_ben)
                            <li class="flex">
                                @include('components.check')
                                <span class="relative ml-4 top-[-3px] mb-2">{{$list_ben}}</span>
                            </li>
                        @endforeach
                    </section>
                    <div class="pt-10">
                        <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"data-preference-id="137501632-01e8ca5f-da7a-4326-b2a7-b8b935545353" data-source="button"></script>                    </div>
                    </div>
        </div>
    </main>
</x-app-layout>
