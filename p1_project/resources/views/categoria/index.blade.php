<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (session('sucesso'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                            <p class="font-bold">Resposta da operação</p>
                            <p>{{ session('sucesso') }}</p>
                        </div>
                    @endif

                    @if (session('erro'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                            <p class="font-bold">Resposta da operação</p>
                            <p>{{ session('erro') }}</p>
                        </div>
                    @endif

                    <div class="flex items-center mt-4 mb-10">
                        <a class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300
                        hover:bg-green-700 hover:text-white focus:outline-none" href="{{route('categoria.create')}}" >Novo Registro</a>
                    </div>
                    <div class="flex">
                        <x-label for="filtro" :value="__('Filtrar por:')" />
                    </div>
                    <form action="{{route('categoria.search')}}" method="get">
                        <div class="flex">
                            <select name="filtro" class="w-full rounded p-2" required>
                                <option value="descricao">Descrição</option>
                            </select>
                            <input name="pesquisa" class="w-full rounded p-2" type="text" placeholder="Informe a palavra-chave...">
                            <button class="px-5 py-2 border-black border text-black rounded transition duration-300
                                        hover:bg-black hover:text-white focus:outline-none" type="submit">Pesquisar</button>
                        </div>
                    </form>
                    <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3
                                rounded-bl-lg rounded-br-lg">
                        <table class="min-w-full">
                            <caption>
                                {{ $categoria->appends(['filtro' => isset($filtro) ? $filtro : '', 'pesquisa' => isset($pesquisa) ? $pesquisa : ''])->links() }}
                            </caption>
                            <thead>
                            <tr>
                                <th class="px-6 py-3  w-1/2 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider">Descrição</th>
                                <th class="px-6 py-3  w-1/2 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500 tracking-wider">Ações</th>
                            </tr>
                            </thead>

                            <tbody>
                            <br>
                            @foreach($categoria as $c)
                                <tr>
                                    <td class="px-6 py-4 truncate whitespace-no-wrap border-b text-gray-900 border-gray-500 text-sm leading-5">{{$c->descricao}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b t border-gray-500 text-sm leading-5 text-left ">
                                        <a class="px-5 py-2 border-blue-500 border align-middle  text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none" href="{{route('categoria.edit', $c->id)}}"><i class="far fa-edit"></i> Alterar</a>
                                        <a class="px-5 py-2 border-red-500 border  align-middle left text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none" href="{{ route('categorias.delete', $c->id)}}" ><i class="far fa-trash-alt"></i> Excluir</a>
                                    </td>
                                </tr>
                            @endforeach

                            @if(count($categoria) == 0)
                                Nenhum registro encontrado!
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


