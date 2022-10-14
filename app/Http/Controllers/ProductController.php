<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cadastro;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Cadastro::latest()->paginate(5);

        return view('products.index', compact('product'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'endereco' => 'required',
            'nascimento' => 'required',
            'sexo' => 'required',
            'estado' => 'required',
            'cidade' => 'required'
        ]);


        Cadastro::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Cliente cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cadastro  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Cadastro $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cadastro  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Cadastro $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cadastro  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cadastro $product)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'endereco' => 'required',
            'nascimento' => 'required',
            'sexo' => 'required',
            'estado' => 'required',
            'cidade' => 'required'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Clinte atualizado com sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cadastro  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cadastro $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Removido com sucesso');
    }
}
