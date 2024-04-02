<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:1', 'max:50'],
            'category_id' => ['required', 'exists:categories,id']
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $validatedData = $validator->validate();
        // $validatedData = Arr::only($validatedData, ['name','category_id']); può essere omesso, i dati validati sono già filtrati rispetto alla request
        $product = Product::create($validatedData);
        return response()->json(['message' => 'Prodotto creato con successo', 'product' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:1', 'max:50'],
            'category_id' => ['required', 'exists:categories,id']
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $validatedData = $validator->validate();
        $product = Product::findOrFail($product->id);
        $product->update($validatedData);
        return response()->json(['message' => 'Prodotto aggiornato con successo', 'product' => $product], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Prodotto eliminato con successo', 'product' => $product], 200);
    }
}
