<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <table  class="table-auto min-w-full">
                            <thead  class="auto">
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('Nome')"/> </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('Login')"/> </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider"> <x-label :value="__('Ação')"/> </th>
                            </thead>
                            @foreach($usuarios as $usuario)
                                <tr class="auto">
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td class="py-4">
                                        <a class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300
                                        hover:bg-blue-700 hover:text-white focus:outline-none" href="{{route('password.reset', $usuario->id)}}">Alterar senha</a>
                                        <a class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300
                                        hover:bg-red-700 hover:text-white focus:outline-none" href="{{ route('usuario.delete', $usuario->id)}}" >Excluir</a>
                                    </td>


                                <tr>
                            @endforeach

                        </table>
                        <br><br>
                        <div class="flex mt-2mb-10">
                            <a class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300
                                        hover:bg-green-700 hover:text-white focus:outline-none" href="{{route('register')}}" >Novo Usuário</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
