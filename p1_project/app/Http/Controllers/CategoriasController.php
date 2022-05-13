<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoria= Categoria::orderBy('descricao')->paginate(5);
        return view('categoria.index', compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoria.create');
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
        try{
            $categoria = new Categoria();
            $dados = $request->only($categoria->getFillable());
            Categoria::create($dados);
            return redirect()->action([CategoriasController::class, 'index'])->with('sucesso', 'Sucesso ao salvar o registro!');
        } catch (\Exception $e){
            return redirect()->action([CategoriasController::class, 'index'])->with('erro', 'Erro ao salvar o registro!');

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
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria') );
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
            $categoria = new Categoria();
            $dados = $request->only($categoria->getFillable());

            Categoria::whereId($id)->update($dados);
            return redirect()->action([CategoriasController::class, 'index'])->with('sucesso', 'Registro alterado com sucesso!');
        } catch(\Exception $e){
            return redirect()->action([CategoriasController::class, 'index'])->with('erro', 'Não foi possível alterar o registro!');
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
            Categoria::destroy($id);
            return redirect()->action([CategoriasController::class, 'index'])->with('sucesso', 'Sucesso ao excluir o registro!');
        } catch(\Exception $e){
            return redirect()->action([CategoriasController::class,'index'])->with('erro', 'Não foi possível excluir o registro!');
        }
    }
    public function search(Request $request){
        $filtro = $request->query('filtro');
        $pesquisa = $request->query('pesquisa');
        $categoria = Categoria::where($filtro, 'like', '%'.$pesquisa.'%')->orderBy($filtro)->paginate(5);

        return view('categoria.index',
            compact('categoria','filtro','pesquisa'));
    }
}
