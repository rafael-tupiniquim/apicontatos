<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContatoController;
use App\Http\Controllers\Api\EnderecoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ==========================================================================

Route::get('/status', [ContatoController::class, 'status']);
Route::get('/statusend', [EnderecoController::class, 'statusend']);

Route::namespace('Api')->group(function() {
    
    Route::post('/contatos/add', [ContatoController::class, 'add']);
    Route::post('/enderecos/add2', [EnderecoController::class, 'add2']);

    Route::get('/contatos', [ContatoController::class, 'list']);
    Route::get('/enderecos', [EnderecoController::class, 'list2']);

    Route::get('/contatos/{id}', [ContatoController::class, 'select']);
    Route::get('/enderecos/{id}', [EnderecoController::class, 'select2']);

    Route::put('/contatos/{id}', [ContatoController::class, 'update']);
    Route::put('/enderecos/{id}', [EnderecoController::class, 'update2']);

    Route::delete('/contatos/{id}', [ContatoController::class, 'delete']);
    Route::delete('/enderecos/{id}', [EnderecoController::class, 'delete2']);

});