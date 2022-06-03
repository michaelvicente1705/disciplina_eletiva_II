<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
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
        $users=Auth::user();
        $produtos = Produto::orderBy('nome')->paginate(5);
        $categorias = Categoria::orderBy('nome');
        return view('produtos.index', compact('produtos', 'categorias'));

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
        return view('produtos.create', compact('categoria') );
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

            $produto = new Produto();
            $dados = $request->only($produto->getFillable());
            $produto = Produto::create($dados);

            //image upload
            $requestImage = $request->foto;
            $extension = $requestImage->extension();
            $imageName = $produto->id . '.' . $extension;
            $produto->caminho_foto = $imageName;
            $dados= $produto->only($produto->getFillable());

            Produto::whereId($produto->id)->update($dados);

            $requestImage->move(public_path('storage/produtos/'), $imageName);
            return redirect()->action([ProdutoController::class, 'index'])->with('Sucesso', 'O produto foi cadastrado com sucesso');
        }

        catch (\Exception $e) {
            return redirect()->action([ProdutoController::class, 'index'])->with('erro', $e);
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
        $produto = Produto::findOrFail($id);
        $categoria= Categoria::findOrFail($produto->categorias_id);

        $img=public_path('storage/produtos/'.$produto->caminho_foto);


        return view('produtos.show', compact('produto', 'categoria', 'img'));
    }
    public function showDash()
    {
        $produtos = Produto::all();
        $categoria= Categoria::all();

        //$img=public_path('storage/produtos/'.$produto->caminho_foto);


       // return view('produtos.show', compact('produto', 'categoria', 'img'));
        return view('dashboard', compact('produtos', 'categoria'));
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
       return view('produtos.edit', compact('produto'));
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
            return view('resultados.sucesso');
        } catch(\Exception $e){
            return redirect()->action([ProdutoController::class, 'index'])->
            with('erro', 'Não foi possível alterar o registro!');
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
            Produto::destroy($id);
            return redirect()->action([ProdutoController::class, 'index'])->with('Sucesso', 'O produto foi excluido com sucesso');
        } catch(\Exception $e){
            return redirect()->action('index')->
            with('erro', 'Não foi possível excluir o registro!');
        }
    }


    public function search(Request $request){

        $filtro = $request->query('filtro');
        $pesquisa = $request->query('pesquisa');
        $produtos = Produto::where($filtro, 'like', '%'.$pesquisa.'%')
            ->orderBy($filtro)->paginate(5);

//        dd($filtro, $pesquisa, $produtos->nome);
        return view('produtos.index',
            compact('produtos'));
    }
}
