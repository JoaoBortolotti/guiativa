<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        <main class="mx-auto max-w-7xl py-12">
            <div class="flex space-x-7">
              <div class="w-[300px] flex flex-col space-y-6">
                <div class="h-[300px] shadow-inner rounded-lg bg-white p-2 relative">
                  <div class="w-max mx-auto pt-8">
                    <img class="w-28 h-28 bg-white rounded-[50%] object-cover" src="https://i.ibb.co/qJQPpJ7/4e8e96fd-e196-4433-9980-25c073e242f8.png"  alt="">
                  </div>
                </div>
                <div class="h-[180px] shadow-2xl rounded-lg bg-white relative">
                  <div class="bg-gray-300 shadow-xl h-10 absolute inset-x-0 top-0 rounded-t-lg text-white font-bold text-sm flex items-center indent-5">Relatório de Atividades</div>
                </div>
                <div class="h-[180px] shadow-2xl rounded-lg bg-white relative">
                  <div class="bg-gray-300 shadow-xl h-10 absolute inset-x-0 top-0 rounded-t-lg text-white font-bold text-sm flex items-center indent-5">Relatório de Pagamentos</div>
                </div>
              </div>
              <div class="w-[1000px] shadow-2xl rounded-lg bg-white p-2 col-span-2 relative">
                  <div class="bg-gray-300 shadow-xl h-14 absolute inset-x-0 top-0 rounded-t-lg flex items-center indent-5">
                    <div class="text-white font-bold text-xl">
                      Prévia e Edição do Anúncio
                    </div>
                  </div>
              </div>
            </div>
          </main>
</x-app-layout>
