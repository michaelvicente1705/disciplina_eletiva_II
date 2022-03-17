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
Route::get('/ex1/calc/', [ExerciciosController::class, 'calcularEx1']);

//Ex2
Route::get('/ex2', [ExerciciosController::class, 'indexEx2']);
Route::get('/ex2/calc/', [ExerciciosController::class, 'calcularEx2']);

