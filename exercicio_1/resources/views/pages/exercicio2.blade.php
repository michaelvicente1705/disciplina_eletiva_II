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
        <form action="/ex2/calc/" method="post">
            @csrf
            <div class="row">

                <div class="col">

                    <input type="number" class="form-control" id="kg" name="kg" required>
                    <label for="kg">Valor do quilo</label>
                </div>

                <div class="col">

                    <input type="number" class="form-control"  id="qnt" name="qnt" required>
                    <label for="qnt">Quantidade de quilos:</label>
                </div>

                <div class="col">

                    <button class="btn btn-primary" >Calcular</button>
                </div>

            </div>
        </form>
        <br>
        <?php
            if(isset($message)){

                echo "<h1>".$message."</h1>";
            }
            if(isset($result)){
                echo $result;
            }
        ?>
    </div>

@endsection
