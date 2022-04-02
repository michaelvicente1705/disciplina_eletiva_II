<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Produto') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{route('permissions.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div>
                            <x-label for="nome" :value="__('Informe o nome da permissão')" />
                            <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" required autofocus />
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


<select name="" id=""></select>




























