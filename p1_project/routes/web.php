<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resources([
    'categoria' => CategoriasController::class,
    'produto' => ProdutosController::class,
    'fornecedor'=> FornecedoresController::class,
]);
//Rotas complementares de Fornecedor

//delete
Route::get('/fornecedor/{id}/delete',
    [FornecedoresController::class, 'destroy'])
    ->name('fornecedor.delete');

Route::get('/categorias/search',
    [CategoriasController::class, 'search'])
    ->name('categoria.search');

//delete
Route::get('/categoria/{id}/delete',
    [CategoriasController::class, 'destroy'])
    ->name('categorias.delete');

//Rotas complementares de Produto


//pesquisa
Route::get('/produtos/search',
    [ProdutosController::class, 'search'])
    ->name('produto.search');

//delete
Route::get('/produto/{id}/delete',
    [ProdutosController::class, 'destroy'])
    ->name('produtos.delete');


require __DIR__.'/auth.php';
