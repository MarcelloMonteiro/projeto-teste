<?php

// namespace App\Http\Controllers\RegisterUserController;

use App\Http\Controllers\ProductController;
use App\Models\Cadastro;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::resource('products', ProductController::class);

Route::get('/search', function (Request $request) {

    $query = Cadastro::query();

    if ($request->has('nome')) {
        $query->where('nome', 'LIKE', '%' . $request->nome . '%');
    }
    if ($request->has('cpf')) {
        $query->where('cpf', 'LIKE', '%' . $request->cpf . '%');
    }
    if ($request->has('nascimento')) {
        $query->where('nascimento', 'LIKE', '%' . $request->nascimento . '%');
    }
    if ($request->has('sexo')) {
        $query->where('sexo', 'LIKE', '%' . $request->sexo . '%');
    }
    if ($request->has('estado')) {
        $query->where('estado', 'LIKE', '%' . $request->estado . '%');
    }
    if ($request->has('cidade')) {
        $query->where('cidade', 'LIKE', '%' . $request->cidade . '%');
    }

    $produtos = $query->paginate();

    return $produtos;
});
