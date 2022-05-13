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
        if(($n1<=0) or ($n2<=0)){
            $message = "Os valores não podem ser negativos ou nulos";
            return view('pages.exercicio1', compact('message'));
        }
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
        if(($kg<=0) or ($qnt<= 0)) {
            $message = "Os valores não podem ser negativos ou nulos";
            return view('pages.exercicio2', compact('message'));
        }
        if($resultado>0){
            $result = "O valor a ser pago é R$ ". $resultado;
            return view('pages.exercicio2', compact('result'));
        }

    }

    public function indexEx3()
    {
        return view("pages.exercicio3");
    }

    public function calcularEx3(Request $request)
    {
        $valor=$request->value;

        if($valor>10) {
            $result = "O valor é maior que 10";
            return view('pages.exercicio3', compact('result'));
        }elseif ($valor<10) {
            $result = "O valor é menor que 10";
            return view('pages.exercicio3', compact('result'));
        }else {
            $result = "o valor é 10";
            return view('pages.exercicio3', compact('result'));
        }
    }

    public function indexEx4()
    {
        return view("pages.exercicio4");
    }

    public function calcularEx4(Request $request)
    {
        $valor=$request->value;

        if($valor>0) {
            $result = "Valor é positivo";
            return view('pages.exercicio4', compact('result'));
        }elseif ($valor<0) {
            $result = "Valor é negativo";
            return view('pages.exercicio4', compact('result'));
        }else {
            $result = "Valor é igual a zero";
            return view('pages.exercicio4', compact('result'));
        }

    }

    public function indexEx5()
    {
        return view("pages.exercicio5");
    }

    public function calcularEx5(Request $request)
    {
        $n1=$request->n1;
        $n2=$request->n2;
        $n3=$request->n3;
        $n4=$request->n4;
        if(($n1 < 0) or ($n2  < 0) or ($n3 < 0) or ($n4 < 0)){
            $message = "Os valores não podem ser negativos";
            return view('pages.exercicio5', compact('message'));
        }
        $nfinal = ($n1+$n2+$n3+$n4)/4;

        if($nfinal>7) {
            $result = "Aprovado";
            return view('pages.exercicio5', compact('result'));
        }else {
            $result = "Reprovado";
            return view('pages.exercicio5', compact('result'));
        }

    }
}
