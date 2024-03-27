<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = array(
            array(
                "name" => "Prodotto 1",
                "sku" => "ABC123",
                "price" => 29.99
            ),
            array(
                "name" => "Prodotto 2",
                "sku" => "DEF456",
                "price" => 49.99
            ),
            array(
                "name" => "Prodotto 3",
                "sku" => "GHI789",
                "price" => 19.99
            ),
            array(
                "name" => "Prodotto 4",
                "sku" => "JKL012",
                "price" => 39.99
            ),
            array(
                "name" => "Prodotto 5",
                "sku" => "MNO345",
                "price" => 59.99
            ),
            array(
                "name" => "Prodotto 6",
                "sku" => "PQR678",
                "price" => 69.99
            ),
            array(
                "name" => "Prodotto 7",
                "sku" => "STU901",
                "price" => 79.99
            ),
            array(
                "name" => "Prodotto 8",
                "sku" => "VWX234",
                "price" => 89.99
            ),
            array(
                "name" => "Prodotto 9",
                "sku" => "YZA567",
                "price" => 99.99
            ),
            array(
                "name" => "Prodotto 10",
                "sku" => "BCD890",
                "price" => 109.99
            )
        );
        return response()->json($products);
    }

    // public function update(Request $request){
    public function update(){
        // return response()->json('sei nella route products in POST: '.$request->input('nome'));
        return response()->json('sei nella route products in POST: '.request()->input('nome'));
    }
    public function show(Request $request, int $id = null){
        return response()->json('sei nella route product con parametro id in GET con id:'. ($id ?? 'non richiesto'));
    }
}
