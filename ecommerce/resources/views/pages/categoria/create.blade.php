<x-app-layout>
    <x-slot name="header">
        Categorias
    </x-slot>
    <br>
    <div class="container">

        <form action="{{route('categorias.store')}}" method="post">
            @csrf

            <x-label>Descrição</x-label>
            <br>

            <x-input name="descricao" class="w-full"/>

            <br>
            <x-button>Salvar</x-button>
        </form>
    </div>

</x-app-layout>
