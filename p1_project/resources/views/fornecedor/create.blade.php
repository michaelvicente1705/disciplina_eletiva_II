<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Fornecedor') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{route('fornecedor.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div >
                            <x-label for="razao_social" :value="__('Razão Social')" />
                            <x-input id="razao_social" class="block mt-1 w-full" type="text" name="razao_social" required autofocus />
                        </div>
                        <br>
                        <div class="flex">
                            <div class="contents">
                                <x-label for="cnpj"  :value="__('CNPJ: ')" />
                                <x-input id="cnpj"  class="flex-1/2" type="number" name="cnpj" required autofocus />
                                <br>
                                <x-label for="estado"  :value="__('   Estado: ')" />
                                <x-input id="estado" class="flex-1/2" type="text" name="estado" required autofocus />
                            </div>
                        </div>
                        <div class="flex">
                            <div class="contents">
                                <x-label for="cidade"  :value="__('Cidade: ')" />
                                <x-input id="cidade"  class="flex-1/2" type="text" name="cidade" required autofocus />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Salvar') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>































