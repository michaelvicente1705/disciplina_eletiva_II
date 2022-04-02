@extends('template.template')
@section('title')
    Laravel - Exercicio 1
@endsection
@section('body')
<div class="container">
     <div class="row control">
        <p>Faça um programa que receba um valor pago, um segundo valor que é o preço do produto e retorne o troco a ser dado.</p>
     </div>
    <form action="/ex1/calc/" method="get">
        <label for="n1"></label>
        <input type="text" id="n1" name="n1">

        <label for="n2"></label>
        <input type="text" id="n2" name="n2">

        <button>Calcular</button>
    </form>

</div>


@endsection
