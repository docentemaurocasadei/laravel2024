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
Route::get('/', function () {
    return response()->redirectTo(\route('public.home'));
});
Route::prefix('public')->group(function () {
    // Questa route risponde a http://localhost:8000/public
    Route::get('/', function () {
        return response()->json(['message' => 'Benvenuto nella pagina pubblica!'], 200);
    })->name('public.home');
    //http://localhost:8000/public/utenti
    // Questa route risponde a http://localhost:8000/public/utenti
    Route::get('/utenti', function () {
        // Restituisci i dati degli utenti come JSON
        $utenti = json_decode(File::get(public_path('storage/utenti.json'), true));
        return response()->json($utenti);
    });

    Route::get('/utente/{id}', function (int $id) {
        // Restituisci i dati degli utenti come JSON
        $utenti = json_decode(File::get(public_path('storage/utenti.json'), true));
        $utenteTrovato = Arr::first($utenti, function ($utente) use ($id) {
            return $utente->id == $id;
        });

        if ($utenteTrovato) {
            return response()->json($utenteTrovato);
        } else {
            return response()->json(['message' => 'Utente non Trovato'], 404);
        }
    });
});
