<x-app-layout>
    <!--Aba de Busca-->
    <div class="py-12">
        <div class="mx-auto max-w-4xl">
            <div class="font-bold text-3xl ">O que deseja buscar?</div>
            <div class="p-5">
                <form action="/" method="GET">
                    <div class="flex justify-center ">
                        <input type="text" name="busca" id="busca" placeholder="Digite aqui..." class="w-4/6 h-16 bg-white rounded-l-full border-gray-800 pl-8 shadow-lg">

                        <button class="bg-gray-900 rounded-r-full h-16 shadow-lg">
                                <svg width="60" height="40" viewBox="0 -15 45 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M42 42L30.913 31.5322M35.8653 19.3048C35.8653 23.8943 34.0813 28.2959 30.9059 31.5411C27.7304 34.7864 23.4235 36.6096 18.9327 36.6096C14.4418 36.6096 10.1349 34.7864 6.95946 31.5411C3.78397 28.2959 2 23.8943 2 19.3048C2 14.7153 3.78397 10.3137 6.95946 7.06846C10.1349 3.82318 14.4418 2 18.9327 2C23.4235 2 27.7304 3.82318 30.9059 7.06846C34.0813 10.3137 35.8653 14.7153 35.8653 19.3048Z" stroke="white" stroke-width="4" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--Final Aba de Busca-->

    <!--foreach de Anúncios-->
    @foreach ($anuncios as $anuncio)
            <main class="mx-auto max-w-4xl pt-2">
                <a href="{{ route('anuncio.view', ['anuncio' =>$anuncio]) }}">
                    <div class="bg-white shadow-xl rounded-t-lg p-12">
                        <!--Interior-->
                        <div class="m-auto flex">
                            <!--Imagem Principal do Anúncio-->
                            <div class="w-3/12 h-fit" id="foto_anuncio">
                                <img class="w-32 h-32 rounded-[10%] object-cover" src="/img/events/{{$anuncio->imagem }}" alt="">
                            </div><!--Final Imagem Principal do Anúncio-->

                            <!--Nome+Estrela Anúncio-->
                            <div class="pt-2 w-5/12">
                                <div class="text-2xl font-semibold">{{$anuncio->titulo }}</div>
                                <div class="text-[80%]">Desde: {{$anuncio->created_at }}</div>

                            </div><!--Final Nome+Estrela Anúncio-->

                            <!--Iformações de Contato-->
                            <div class="w-4/12 my-auto space-y-1">
                                @if ($anuncio->user->contato !== null && $anuncio->user->endereco !== null)
                                    <h6 class="text-sm">Telefone: {{ $anuncio->user->contato->ddd }} - {{ $anuncio->user->contato->celular }}</h6>
                                    <h6 class="text-sm">Endereço: {{ $anuncio->user->endereco->endereco }}, nº {{ $anuncio->user->endereco->numero }}</h6>
                                    <h6 class="text-sm">Email: {{ $anuncio->user->email }} </h6>
                                @else
                                    <h6 class="text-sm">Telefone: </h6>
                                    <h6 class="text-sm">Endereço: </h6>
                                    <h6 class="text-sm">Email: </h6>
                                @endif
                            </div><!--Final Iformações de Contato-->
                        </div><!--Final Interior-->
                    </div>
                </a>
            </main>
    @endforeach
</x-app-layout>
