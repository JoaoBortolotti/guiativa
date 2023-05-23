<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="mx-auto max-w-7xl py-12">
        <div class="flex space-x-7">
            <!--Painel Lateral-->
            <div class="w-[300px] flex flex-col space-y-6">
                <!--Perfil-->
                <div class="h-[300px] shadow-2xl rounded-lg bg-white relative">
                    <!--Imagem Perfil-->
                    <div class="w-max h-fit mx-auto pt-8">
                        <img class="w-28 h-28 rounded-[50%] object-cover" src="https://i.ibb.co/qJQPpJ7/4e8e96fd-e196-4433-9980-25c073e242f8.png" alt="">
                    </div> <!--Final Imagem de Perfil-->
                    <!--Informações de Perfil-->
                    <div class="pt-5 w-max m-auto text-center">
                        <div class="text-base">João Marcos Bortolotti</div>
                        <div class="font-light text-xs">Desde 22/05/2023</div>
                    </div><!--Final Informações de Perfil-->
                    <div class="pt-5 w-max m-auto">
                        <x-primary-button class="ml-3">
                            <a href="{{ route('profile.edit') }}">Editar Perfil</a>
                        </x-primary-button>
                    </div>

                </div><!--Final Perfil-->

                <!--Atividades-->
                <div class="h-[180px] shadow-2xl rounded-lg bg-white relative">
                    <div class="bg-gray-300 shadow-xl h-10 inset-x-0 top-0 rounded-t-lg text-white font-bold text-sm flex items-center indent-5">Relatório de Atividades</div>

                    <div class="w-max m-auto p-6 flex">
                        <div class="text-7xl pr-6">50</div>
                        <div class="m-auto pt-3">Total de <br> Visualizações</div>
                    </div>
                </div><!--Final Atividades-->

                <!--Pagamentos-->
                <div class="h-[180px] shadow-2xl rounded-lg bg-white relative">
                    <div class="bg-gray-300 shadow-xl h-10 inset-x-0 top-0 rounded-t-lg text-white font-bold text-sm flex items-center indent-5">Relatório de Pagamentos</div>

                    {{-- @if ( ) --}}
                        <div class="w-max m-auto flex pt-8">
                            <div class="pr-5"><img class="h-20" src="https://i.ibb.co/ZB43sBk/validando-o-bilhete.png" alt="validando-o-bilhete"></div>
                            <div class="pt-2">Pagamento <br> Confirmado</div>
                        </div>
                    {{-- @else
                        <div class="w-max m-auto flex p-6">
                            <div class="pr-6"><img class="h-20" src="https://i.ibb.co/WsxJmfN/conta.png" alt="validando-o-bilhete"></div>
                            <div class="pt-4">Pagamento <br> Pendente</div>
                        </div>
                    @endif --}}

                </div><!--Final Pagamentos-->
            </div><!--Final Painel Lateral-->

            <!--Painel Principal-->
            <div class="w-[1000px] h-[300px] shadow-2xl rounded-lg bg-white relative">
                <div class="bg-gray-300 shadow-xl h-14 inset-x-0 top-0 rounded-t-lg flex items-center indent-5">
                    <div class="text-white font-bold text-xl">
                    Prévia e Edição do Anúncio
                    </div>
                </div>
                <!--Interior-->
                <div class="w-max m-auto pt-9 flex">
                    <!--Imagem Principal do Anúncio-->
                    <div class="w-max h-fit mx-auto pr-10">
                          <img class="w-32 h-32 rounded-[10%] object-cover" src="https://i.ibb.co/qJQPpJ7/4e8e96fd-e196-4433-9980-25c073e242f8.png" alt="">
                    </div><!--Final Imagem Principal do Anúncio-->

                    <!--Nome+Estrela Anúncio-->
                    <div class="pt-2">
                        <div class="text-2xl font-semibold"><"Nome do Anúncio"></div>
                        <div class="text-[80%]">em <"CategoriasQueSeEnquadra"></div>
                        <!--Avaliação de Estrelas-->
                        <div class="pt-6">
                            Estrelas
                        </div><!--Final Avaliação de Estrelas-->
                    </div><!--Final Nome+Estrela Anúncio-->

                        <!--Iformações de Contato-->
                        <div class="pl-36 pt-10 space-y-1">
                            <h6 class="text-sm">Telefone: <"seutelefone"></h6>
                            <h6 class="text-sm">Endereço: <"seuendereço"></h6>
                            <h6 class="text-sm">Site: <"linkparasite"></h6>
                        </div><!--Final Iformações de Contato-->
                    </div><!--Final Interior-->

                    <div class="absolute bottom-5 right-5">
                    <x-primary-button class="ml-3">
                        <a href="{{ route('profile.edit') }}">Editar Anúncio</a>
                    </x-primary-button>
                    </div>
            </div><!--Final Painel Principal-->
        </div>
      </main>
</x-app-layout>
