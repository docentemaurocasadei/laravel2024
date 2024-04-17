<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        return response()->json([
            'products' => Product::with('Category')->get()
        ]) ;
    }
}
