<?php

use App\Models\Categoria;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('produtos', function (Blueprint $table) {
            $table->id()->unique();

            $table->string('nome');
            $table->float('valor');
            $table->string('descricao');


            $table->unsignedBigInteger('fornecedors_id');
            $table->foreign('fornecedors_id')->references('id')->on('fornecedors');

            $table->unsignedBigInteger('categorias_id');
            $table->foreign('categorias_id')->references('id')->on('categorias');

            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
