<x-app-layout>
    <script src="https://assets.pagseguro.com.br/checkout-sdk-js/rc/dist/browser/pagseguro.min.js"></script>

    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form method="post" action="" class="my-6 space-y-6 gap-6" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="">
                            <div>
                                <label for="">Cartão de Crédito</label>
                                <input type="text" name="ncredito" class="ncredito form-control">
                            </div>

                            <div>
                                <label for="">CVV:</label>
                                <input type="text" name="ncvv" class="ncvv form-control">
                            </div>

                            <div>
                                <label for="">Mês Expiração</label>
                                <input type="text" name="mesexp" class="mesexp form-control">
                            </div>

                            <div>
                                <label for="">Ano Expiraçao</label>
                                <input type="text" name="anoexp" class="anoexp form-control">
                            </div>

                            <div>
                                <label for="">Nome do Cartão</label>
                                <input type="text" name="nomecartao" class="nomecartao form-control">
                            </div>

                            <label for="">Valor Total</label>
                        </div>

                        <x-primary-button type="submit">{{ __('Pagar') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
