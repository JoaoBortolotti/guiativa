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
                </div><!--Final Atividades-->

                <!--Pagamentos-->
                <div class="h-[180px] shadow-2xl rounded-lg bg-white relative">
                    <div class="bg-gray-300 shadow-xl h-10 inset-x-0 top-0 rounded-t-lg text-white font-bold text-sm flex items-center indent-5">Relatório de Pagamentos</div>
                </div><!--Final Pagamentos-->
            </div><!--Final Painel Lateral-->

            <!--Painel Principal-->
            <div class="w-[1000px] shadow-2xl rounded-lg bg-white relative">
                <div class="bg-gray-300 shadow-xl h-14 inset-x-0 top-0 rounded-t-lg flex items-center indent-5">
                    <div class="text-white font-bold text-xl">
                    Prévia e Edição do Anúncio
                    </div>
                </div>
            </div><!--Final Painel Principal-->
        </div>
      </main>
</x-app-layout>
