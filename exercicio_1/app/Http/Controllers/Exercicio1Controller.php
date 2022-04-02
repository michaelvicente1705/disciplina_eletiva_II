<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Exercicio1Controller extends Controller
{
    //
    public function index()
    {
        return view('pages.exercicio1');
    }

    public function calcular(Request $request)
    {
        //valor pago
        $n1 = $request->n1;
        //preço
        $n2 = $request->n2;

        $resultado = $n2 - $n1;
        if ($resultado<0) {
            return "O troco a ser dado é R$ ". $resultado*(-1);
        }
        elseif($resultado>0){
            return "ainda restam R$ ". $resultado." a serem pagos";
        }else{
            return "Venda concluída! ";
        }

    }
}
