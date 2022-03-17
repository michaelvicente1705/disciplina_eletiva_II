@extends('template.template')
@section('title')
    Laravel - Exercicio 4
@endsection
@section('body')
    <br>
    <div class="container">
        <br>
        <div class="row control">
           <p>Desenvolva um programa que receba um valor digitado pelo usuário e verifique se esse valor é positivo, negativo ou igual a zero. Imprima na tela: "Valor Positivo", "Valor Negativo", "Igual a Zero".</p>
        </div>
        <br>
        <form action="/ex4/calc/" method="post">
            @csrf
            <div class="row">

                <div class="col-4">
                    <label for="value">Insira um valor</label>
                    <input type="number" class="form-control" id="value" name="value" required>
                </div>
                <div class="col-1">
                    <br>
                    <button class="btn btn-primary">Calcular</button>
                </div>

            </div>
        </form>
        <br>
        <?php
        if(isset($result)){
            echo $result;
        }
        ?>
    </div>
@endsection
