<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Fornecedor :  '.$fornecedor->razao_social ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <form method="post" action="{{route('fornecedor.update', $fornecedor->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class=" flex flex-wrap ">
                                <div class="col p-4">
                                    <div class="md:w-1/2">
                                        <label for="nome">Razão Social: </label>
                                    </div>

                                    <div class="md:w-1/2">
                                        <x-input id="razao_social" name="razao_social" type="text" class="rounded" value="{{$fornecedor->razao_social}}"/>
                                    </div>
                                </div>
                                <div class="col  p-4">
                                    <div class="md:w-1/2">
                                        <label for="valor">CNPJ:</label>

                                    </div>
                                    <div class="md:w-1/2">
                                        <x-input id="cnpj"  name="cnpj" type="number"  value="{{$fornecedor->cnpj}}" />
                                    </div>
                                </div>
                                <div class="col  p-4">
                                    <div class="md:w-1/2">
                                        <label for="estado" >Estado:</label>
                                    </div>
                                    <div class="md:w-1/2">
                                        <x-input id="estado"  name="estado" type="text" value="{{$fornecedor->estado}}"/>
                                    </div>
                                </div>
                                <div class="col  p-4">
                                    <div class="md:w-1/2">
                                        <label for="cidade" >Cidade:</label>
                                    </div>
                                    <div class="md:w-1/2">
                                        <x-input id="cidade"  name="cidade" type="text" value="{{$fornecedor->cidade}}"/>
                                    </div>
                                </div>
                                <div class= "flex items-center justify-end mt-4">
                                    <x-button class="ml-4">
                                        {{ __('Atualizar') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
