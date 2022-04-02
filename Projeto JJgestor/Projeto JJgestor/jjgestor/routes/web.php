<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Auth\RegisteredUserController;


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
    return view('auth.login');
});

Route::get('/dashboard', [ProdutoController::class, 'showDash'])->middleware(['auth'])->name('dashboard');


//Rotas produtos

Route::resources([
    'produto' => ProdutoController::class,
    'categoria' => CategoriaController::class,

]);

Route::get('/produto', [ProdutoController::class, 'index'])->name('produto');

Route::get('/produtos/search',
    [ProdutoController::class, 'search'])
    ->name('produto.search');


Route::get('/produto/{id}/delete',
    [ProdutoController::class, 'destroy'])
    ->name('produtos.delete');

//Rotas Categorias


Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria');

Route::get('/categoria/{id}/delete',
    [CategoriaController::class, 'destroy'])
    ->name('categorias.delete');

//Rotas Users

Route::get('/usuario/{id}/delete',
    [RegisteredUserController::class, 'delete'])
    ->name('usuario.delete');


Route::get('/usuarios', [RegisteredUserController::class, 'index'])->name('usuarios');


require __DIR__.'/auth.php';
