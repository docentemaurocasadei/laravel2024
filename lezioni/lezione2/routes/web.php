<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UtilityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prodotti1', function(){
    // return response()->redirectTo('/products', 301);
    return redirect()->route('front.products');
});
Route::redirect('/prodotti','/products', 301);
//creare un controller nominato UtilityController 
//con il metodo getToken che ritorna il token
Route::get('/token', [UtilityController::class, 'getToken']);

Route::get('/products', [ProductController::class, 'index'])->name('front.products');
//spostare la logica dal file web al controller creando dei nuovi metodi
Route::post('/product', [ProductController::class, 'update']);
// rotta con parametri
Route::get('/product/{id?}', [ProductController::class, 'show']);
