<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Produto :  '.$produto->nome ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <form method="post" action="{{route('produto.update', $produto->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class=" flex flex-wrap ">
                                <div class="col p-4">
                                    <div class="md:w-1/2">
                                        <label for="nome">Nome do Produto</label>
                                    </div>

                                    <div class="md:w-1/2">
                                        <x-input id="nome" name="nome" type="text" class="rounded" value="{{$produto->nome}}"/>
                                    </div>
                                </div>
                                <div class="col  p-4">
                                    <div class="md:w-1/2">
                                        <label for="valor">Valor da unidade</label>

                                    </div>
                                    <div class="md:w-1/2">
                                        <x-input id="valor"  name="valor" type="number"  value="{{ number_format($produto->valor, 2)}}" />
                                    </div>
                                </div>
                                <div class="col  p-4">
                                    <div class="md:w-1/2">
                                        <label for="descricao" >Descrição</label>
                                    </div>
                                    <div class="md:w-1/2">
                                        <x-input id="descricao"  name="descricao" type="text" value="{{$produto->descricao}}"/>
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
