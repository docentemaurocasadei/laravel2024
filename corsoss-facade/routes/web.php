<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/get-cache', function (Request $request) {
    $variabileTest = Cache::get('variabile_test');
    print $request->url();
    print '<br>';
    return new Response('letto:' . $variabileTest);
});
Route::get('/set-cache/{param?}', function (string $param = null) {
    $variabileTest = $param ?? 'variabile di test';
    Cache::put('variabile_test', $variabileTest, now()->addMinutes(60));
    return response()->json('impostata correttamente: ' . $variabileTest);
});
