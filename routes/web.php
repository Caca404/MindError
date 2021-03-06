<?php

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
use App\Http\Controllers\ShopController;

Route::get('/', [ShopController::class, "index"]);

Route::get('/vestuario/{type}', [ShopController::class, "vestuario"]);
Route::get('/jogos/{type}', [ShopController::class, "jogos"]);
Route::get('/colecionaveis/{type}', [ShopController::class, "colecionaveis"]);
Route::get('/acessorios/{type}', [ShopController::class, "acessorios"]);
Route::get('/produto/{id}', [ShopController::class, "produto"]);
Route::get('/addProduto', [ShopController::class, "addProdutoView"])->middleware('auth');
Route::get('/getImagemInput', [ShopController::class, "getImagemInputTemplate"]);
Route::get('/getCarrosselImgs', [ShopController::class, "getCarrosselImgs"]);
Route::get('/meusProdutos', [ShopController::class, "myProdutos"])->middleware('auth');
Route::get('/pesquisa', [ShopController::class, "pesquisa"]);


Route::post('/addProduto', [ShopController::class, "addProduto"]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
