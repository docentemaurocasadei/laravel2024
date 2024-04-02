<?php

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
Route::get('session-get-var', function(){
    return response()->json([
        'myvar' => session('myvar'),
        'message' => 'myvar letta correttamente',
    ]);
});
Route::get('session-set-var/{myvar}', function(string $myvar){
    session(['myvar' => $myvar]);
    return response()->json([
        'message' => 'myvar impostata correttamente',
    ]);
});