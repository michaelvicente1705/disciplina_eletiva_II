@extends('template.template')
@section('title')
    Laravel - Exercicio 2
@endsection
@section('body')
    <br>
    <div class="container">
        <br>
        <div class="row control">
            <p>Faça um programa que receba o valor do quilo de um produto e a quantidade de quilos do produto consumida, calculando o valor final a ser pago..</p>
        </div>
        <br>
        <form action="/ex2/calc/" method="get">
            <div class="row">

                <div class="col">
                    <label for="kg">Valor do quilo</label>
                    <input type="text" id="kg" name="kg">
                </div>

                <div class="col">
                    <label for="qnt">Quantidade de quilos:</label>
                    <input type="text" id="qnt" name="qnt">
                </div>

                <div class="col">
                    <button>Calcular</button>
                </div>

            </div>
        </form>

    </div>

@endsection
