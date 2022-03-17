@extends('template.template')
@section('title')
    Laravel - Exercicio 1
@endsection
@section('body')
<div class="container">
    <br>
     <div class="row control">
        <p>Faça um programa que receba um valor pago, um segundo valor que é o preço do produto e retorne o troco a ser dado.</p>
     </div>
    <br>
    <form action="/ex1/calc/" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <label for="n2">Valor do produto</label>
                <input type="number" id="n2" name="n2">
            </div>
            <div class="col">
                <label for="n1">Valor pago:</label>
                <input type="number" id="n1" name="n1">

            </div>
            <div class="col">
                <button>Calcular</button>
            </div>
        </div>
    </form>
    <br>
    <?php
        if(isset($def)){
            echo $def;
        }
    ?>

</div>


@endsection
