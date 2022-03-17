<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExerciciosController extends Controller
{
    //
    public function indexEx1()
    {
        return view('pages.exercicio1');
    }

    public function calcularEx1(Request $request)
    {
        //valor pago
        $n1 = $request->n1;
        //preço
        $n2 = $request->n2;

        $resultado = $n2 - $n1;
        if ($resultado<0) {
            $def = "O troco a ser dado é R$ ". $resultado*(-1);
            return view('pages.exercicio1', compact('def'));
        }
        elseif($resultado>0){
            $def = "ainda restam R$ ". $resultado." a serem pagos";
            return view('pages.exercicio1', compact('def'));
        }else{
            $def = "Venda concluída! ";
            return view('pages.exercicio1', compact('def'));
        }

    }

    public function indexEx2()
    {
        return view("pages.exercicio2");
    }

    public function calcularEx2(Request $request)
    {
        $kg = $request->kg;
        $qnt = $request->qnt;

        $resultado = $qnt * $kg;

        if($resultado>0){
            return "O valor a ser pago é R$ ". $resultado;
        }

    }
}
