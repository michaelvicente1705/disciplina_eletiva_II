<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar Fornecedor '.$fornecedor->razao_social) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <table  class="table-auto min-w-full">
                            <thead  class="auto">
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('Razão Social')"/> </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('CNPJ')"/> </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('Estado')"/> </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('Cidade')"/> </th>

                            </thead>
                            <tr class="auto">
                                <td>{{$fornecedor->razao_social}}</td>
                                <td>{{$fornecedor->cnpj}}</td>
                                <td> {{$fornecedor->estado}}</td>
                                <td> {{$fornecedor->cidade}}</td>
                            <tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
