<?php

use App\Http\Controllers\PrivateController;
use App\Http\Middleware\RichiestaValida;
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

Route::get('pubblica/', function () {
    return response()->json('pubblica');
});
Route::get('privata/', function () {
    return response()->json('privata');
})->middleware(['richiesta.valida']);

Route::get('privata-controller/', [PrivateController::class, 'index'])->middleware(['richiesta.valida']);
Route::get('privata-with-cookie/', [PrivateController::class, 'indexWithCookie'])->middleware(['richiesta.valida']);
