<x-app-layout>
    <x-slot name="header">

        Categorias

    </x-slot>
    <table>
        <tr>
            <td>Categorias</td>
        </tr>

    @if(isset($categorias))
            @foreach ($categorias as $c )
        <tr>
            <td>{{$c->descricao}}</td>
        </tr>

    @endforeach
    @endif

    </table>
</x-app-layout>
