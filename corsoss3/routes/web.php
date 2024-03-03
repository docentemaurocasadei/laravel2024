<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
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

/*solo per test*/
Route::group([], function ($route) {
    Route::get('/', function () {
        return view('index');
    })->name('front.index');

    Route::get('/utenti', function () {
        // Restituisci i dati degli utenti come JSON
        $utenti = json_decode(File::get(public_path('storage/utenti.json'), true));
        return view('page.utenti')->with([
            'utenti' => $utenti,
        ]);
    })->name('front.utenti');

    Route::get('/utente/{id}', function (int $id) {
        // Restituisci i dati degli utenti come JSON
        $utenti = json_decode(File::get(public_path('storage/utenti.json'), true));
        $utente = Arr::first($utenti, function ($utente) use ($id) {
            return $utente->id == $id;
        });
        return view('page.utente')->with([
            'utente' => $utente,
        ]);
    })->name('front.utente');

});
