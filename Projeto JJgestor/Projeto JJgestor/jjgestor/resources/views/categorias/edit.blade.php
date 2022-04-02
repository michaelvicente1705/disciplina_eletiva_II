<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoria :  '.$categoria->nome ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <form method="post" action="{{route('categoria.update', $categoria->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class=" flex flex-wrap ">
                                <div class="md:w-1/2">
                                    <label for="nome">Nome da categoria</label>
                                </div>

                                <div class="md:w-1/2">
                                    <x-input id="nome" name="nome" type="text" class="rounded-"
                                             value="{{$categoria->nome}}"/>
                                </div>
                                <div class="flex items-center justify-end mt-4">
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
