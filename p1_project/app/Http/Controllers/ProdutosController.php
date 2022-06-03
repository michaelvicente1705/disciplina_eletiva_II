<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProdutosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        Gate::authorize("administrador");
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
        Gate::authorize("administrador");
        $fornecedor= Fornecedor::all();
        $categoria= Categoria::all();
        return view('produto.create', compact('categoria', 'fornecedor') );
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
        Gate::authorize("administrador");
        try {

            $produto = new Produto();
            $dados = $request->only($produto->getFillable());
            $produto = Produto::create($dados);

            //image upload
            $requestImage = $request->foto;
            $extension = $requestImage->extension();
            $imageName = $produto->id . '.' . $extension;
            $produto->caminho_foto = $imageName;
            $dados= $produto->only($produto->getFillable());
            $requestImage->move(public_path('storage/produtos/'), $imageName);
            Produto::whereId($produto->id)->update($dados);

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
        Gate::authorize("administrador");
        $produto = Produto::findOrFail($id);
        $categoria= Categoria::findOrFail($produto->categorias_id);
        $fornecedor= Fornecedor::findOrFail($produto->fornecedors_id);
        return view('produto.show', compact('produto', 'categoria', 'fornecedor'));
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
        Gate::authorize("administrador");
        $fornecedor= Fornecedor::all();
        $categoria= Categoria::all();

        $categoriaAtual = Produto::findOrFail($id);
        $fornecedorAtual = Produto::findOrFail($id);

        $produto = Produto::findOrFail($id);
        return view('produto.edit', compact('produto', 'categoria','fornecedor','fornecedorAtual','categoriaAtual'));
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
        Gate::authorize("administrador");
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
        Gate::authorize("administrador");
        try{
            Produto::destroy($id);
            return redirect()->action([ProdutosController::class, 'index'])->with('sucesso', 'O produto foi excluido com sucesso');
        } catch(\Exception $e){
            return redirect()->action([ProdutosController::class, 'index'])->with('erro', 'Não foi possível excluir o registro!');
        }
    }
    public function search(Request $request){
        Gate::authorize("administrador");
        $filtro = $request->query('filtro');
        $pesquisa = $request->query('pesquisa');
        $produtos = Produto::where($filtro, 'like', '%'.$pesquisa.'%')->orderBy($filtro)->paginate(5);

        return view('produto.index', compact('produtos','filtro','pesquisa' ));
    }
}
