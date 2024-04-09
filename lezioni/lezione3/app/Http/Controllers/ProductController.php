<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TokenMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{   
    public function __construct()
    {
        // $this->middleware(TokenMiddleware::class);
    }

    public function index(){
        $products = [
            ['name' => 'prodotto1', 'sku' => 'pdt1', 'price' => 10],
            ['name' => 'prodotto2', 'sku' => 'pdt2', 'price' => 11],
            ['name' => 'prodotto3', 'sku' => 'pdt3', 'price' => 12],
            ['name' => 'prodotto4', 'sku' => 'pdt4', 'price' => 13],
            ['name' => 'prodotto5', 'sku' => 'pdt5', 'price' => 14],
        ];
        return response()->json([
            'products' => $products,
            'message' => 'chiamata riuscita',
        ], 200);
    }
    public function store(Request $request){ //POST
        $validator = Validator::make($request->all(),[
            'email' => ['required','email'],
            'password' => ['sometimes','min:5'],
        ]);
        if ($validator->fails()) {
            return response()->json(
                ['errors' => $validator->errors()], 400);
        }
        $validatedData = $validator->validate();
            
        Log::debug($validatedData);
        return response()->json(['message' => 'sono nello store']);
    }
    public function update(Request $request){ //PUT/PATCH
        Log::debug($request);
        return response()->json(['message' => 'sono nell\'update']);
    }
    public function destroy(string $id)
    {
        return response()->json(['message' => 'sono nel destroy']);
    }
}
