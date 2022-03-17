<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExerciciosController;
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

Route::get('/', [HomeController::class, 'index']);

//Ex1
Route::get('/ex1', [ExerciciosController::class, 'indexEx1']);
Route::post('/ex1/calc/', [ExerciciosController::class, 'calcularEx1']);

//Ex2
Route::get('/ex2', [ExerciciosController::class, 'indexEx2']);
Route::post('/ex2/calc/', [ExerciciosController::class, 'calcularEx2']);

//Ex3
Route::get('/ex3', [ExerciciosController::class, 'indexEx3']);
Route::post('/ex3/calc/', [ExerciciosController::class, 'calcularEx3']);


//Ex4
Route::get('/ex4', [ExerciciosController::class, 'indexEx4']);
Route::post('/ex4/calc/', [ExerciciosController::class, 'calcularEx4']);

//Ex5
Route::get('/ex5', [ExerciciosController::class, 'indexEx5']);
Route::post('/ex5/calc/', [ExerciciosController::class, 'calcularEx5']);
