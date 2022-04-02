<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="slot">



            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div>
                                <table  class="table-auto min-w-full">
                                    <thead  class="auto">
{{--                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('Foto')"/> </th>--}}
                                    <th class="px-6 py-3 border-b-2 auto border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('Nome')"/> </th>
                                    <th class="px-6 py-3 border-b-2 auto border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('Categoria')"/> </th>
                                    <th class="px-6 py-3 border-b-2 auto border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('Descrição')"/> </th>
                                    <th class="px-6 py-3 border-b-2 auto border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('valor')"/> </th>

                                    </thead>
                                    <tr class="auto">

                                        @foreach($produtos as $produto)

                                            <td><img class="h-20 w-30"  src="{{url('storage/produtos/'.$produto->caminho_foto)}}" alt="error"></td>
                                            <td>{{$produto->nome}}</td>
                                            <td> {{$produto->descricao}}</td>
                                            <td> R$ {{ number_format($produto->valor, 2)}}</td>
                                            <tr></tr>
                                        @endforeach

                                    <tr>

                                </table>


                            </div>

                        </div>
                    </div>
                </div>
            </div>




    </x-slot>
</x-app-layout>
