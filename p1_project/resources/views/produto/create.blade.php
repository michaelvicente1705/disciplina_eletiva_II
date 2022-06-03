<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Produto') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{route('produto.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div>
                            <x-label for="nome" :value="__('Informe o nome')" />
                            <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" required autofocus />
                        </div>
                        <div>
                            <label for="categoria">Categoria</label>
                            <select name="categorias_id" class="w-full rounded p-2"  required>
                                @foreach($categoria as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="categoria">Fornecedor</label>
                            <select name="fornecedors_id" class="w-full rounded p-2"  required>
                                @foreach($fornecedor as $fornecedor)
                                    <option value="{{$fornecedor->id}}">{{$fornecedor->razao_social}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div>
                            <x-label for="descricao" :value="__('Descrição')" />
                            <x-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" required autofocus />
                        </div>
                        <div>
                            <x-label for="valor" :value="__('Valor')" />
                            <x-input id="valor" class="block mt-1 w-full" type="text" name="valor" required autofocus />
                        </div>
                        <br>
                        <div>
                            <x-label for="foto" :value="__('Insira a foto do produto') "/>
                            <x-input id="foto" name="foto"  required class="block mt-1 w-full" type="file" />
                        </div>
                        <br>
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


<select name="" id=""></select>




























