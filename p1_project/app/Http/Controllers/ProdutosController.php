<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produtos = Produto::orderBy('nome')->paginate(5);
        $categorias = Categoria::orderBy('descricao');
        return view('produto.index', compact('produtos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $categoria= Categoria::all();
        return view('produto.create', compact('categoria') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $produto = new Produto();
            $dados = $request->only($produto->getFillable());
            $produto = Produto::create($dados);
            return redirect()->action([ProdutosController::class, 'index'])->with('Sucesso', 'O produto foi cadastrado com sucesso');
        }

        catch (\Exception $e) {
            return redirect()->action([ProdutosController::class, 'index'])->with('erro', $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $produto = Produto::findOrFail($id);
        $categoria= Categoria::findOrFail($produto->categorias_id);
        return view('produto.show', compact('produto', 'categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $produto = Produto::findOrFail($id);
        return view('produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try{
            $produto = new Produto();
            $dados = $request->only($produto->getFillable());

            Produto::whereId($id)->update($dados);
            return redirect()->action([ProdutosController::class, 'index'])->with('sucesso', 'O registro foi alterado!');
        } catch(\Exception $e){
            return redirect()->action([ProdutosController::class, 'index'])->with('erro', 'Não foi possível alterar o registro!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            Produto::destroy($id);
            return redirect()->action([ProdutosController::class, 'index'])->with('sucesso', 'O produto foi excluido com sucesso');
        } catch(\Exception $e){
            return redirect()->action([ProdutosController::class, 'index'])->with('erro', 'Não foi possível excluir o registro!');
        }
    }
    public function search(Request $request){

        $filtro = $request->query('filtro');
        $pesquisa = $request->query('pesquisa');
        $produtos = Produto::where($filtro, 'like', '%'.$pesquisa.'%')->orderBy($filtro)->paginate(5);

        return view('produto.index', compact('produtos'));
    }
}
