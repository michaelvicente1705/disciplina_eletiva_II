@extends('template.template')
@section('title')
    Laravel - Exercicio 3
@endsection
@section('body')
    <br>
    <div class="container">
        <br>
        <div class="row control">
            <p>Desenvolva um programa que receba um valor digitado pelo usuário e imprima o texto "o valor é maior que 10" caso isso seja verdade, senão imprima "o valor é menor que 10".</p>
        </div>
        <br>
        <form action="/ex3/calc/" method="post">
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
