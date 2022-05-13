<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fornecedores=Fornecedor::orderBy('razao_social')->paginate(5);
        return view('fornecedor.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fornecedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $fornecedor = new Fornecedor();
            $dados = $request->only($fornecedor->getFillable());
            Fornecedor::create($dados);
            return redirect()->action([FornecedoresController::class, 'index'])->with('Sucesso', 'O fornecedor foi cadastrado com sucesso');
        }

        catch (\Exception $e) {
            return redirect()->action([FornecedoresController::class, 'index'])->with('erro', $e);
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
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedor.show', compact('fornecedor'));
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
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedor.edit', compact('fornecedor'));
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
        try{
            $produto = new Fornecedor();
            $dados = $request->only($produto->getFillable());

            Fornecedor::whereId($id)->update($dados);
            return redirect()->action([FornecedoresController::class, 'index'])->with('sucesso', 'O Fornecedor foi alterado!');
        } catch(\Exception $e){
            return redirect()->action([FornecedoresController::class, 'index'])->with('erro', 'Não foi possível alterar o registro do Fornecedor!');
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
        try{
            Fornecedor::destroy($id);
            return redirect()->action([FornecedoresController::class, 'index'])->with('sucesso', 'O fornecedor foi excluido com sucesso');
        } catch(\Exception $e){
            return redirect()->action([FornecedoresController::class, 'index'])->with('erro', 'Não foi possível excluir o registro do fornecedor!');
        }
    }
}
