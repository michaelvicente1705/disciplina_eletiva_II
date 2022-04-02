<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Categoria') }}
        </h2>
    </x-slot>
    <div class="p-12">

        <form action="{{route('categoria.store')}}" method="post">
            @csrf

            <div>
                <x-label for="descricao" :value="__('Informe o nome da categoria')" />
                <x-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Salvar') }}
                </x-button>
            </div>
        </form>

    </div>

</x-app-layout>
