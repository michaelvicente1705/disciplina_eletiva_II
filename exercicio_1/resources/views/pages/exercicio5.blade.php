@extends('template.template')
@section('title')
    Laravel - Exercicio 5
@endsection
@section('body')

<br>
<div class="container">
    <br>
    <div class="row control">
        <p>Desenvolva um programa que receba quatro notas de um aluno, calcule e imprima a média aritmética das notas e a mensagem de aprovado para média superior ou igual a 7.0 ou a mensagem de reprovado para média inferior a 7.0</p>
    </div>
    <br>
    <form action="/ex5/calc/" method="post">
        @csrf
        <div class="row">

            <div class="col-3">
                <label for="n1">Nota 1</label>
                <input type="number" class="form-control " id="n1" name="n1" required>
            </div>
            <div class="col-3">
                <label for="n2">Nota 2</label>
                <input type="number" class="form-control " id="n2" name="n2" required >
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="n3">Nota 3</label>
                <input type="number" class="form-control " id="n3" name="n3"  required>
            </div>
            <div class="col-3">
                <label for="n4">Nota 4</label>
                <input type="number" class="form-control " id="n4" name="n4" required>
            </div>
        </div>
        <br>

        <button class="btn btn-primary">Calcular</button>

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
