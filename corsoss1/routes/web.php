<?php

use Illuminate\Support\Arr;
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
$utenti = [
    ['id' => 1, 'nome' => 'Mario', 'cognome' => 'Rossi', 'email' => 'mario@example.com'],
    ['id' => 2, 'nome' => 'Luigi', 'cognome' => 'Verdi', 'email' => 'luigi@example.com'],
    ['id' => 3, 'nome' => 'Anna', 'cognome' => 'Bianchi', 'email' => 'anna@example.com'],
    ['id' => 4, 'nome' => 'Giovanni', 'cognome' => 'Neri', 'email' => 'giovanni@example.com'],
    ['id' => 5, 'nome' => 'Francesca', 'cognome' => 'Gialli', 'email' => 'francesca@example.com'],
    ['id' => 6, 'nome' => 'Marco', 'cognome' => 'Verdi', 'email' => 'marco@example.com'],
    ['id' => 7, 'nome' => 'Laura', 'cognome' => 'Rosa', 'email' => 'laura@example.com'],
    ['id' => 8, 'nome' => 'Paolo', 'cognome' => 'Blu', 'email' => 'paolo@example.com'],
    ['id' => 9, 'nome' => 'Elena', 'cognome' => 'Gialli', 'email' => 'elena@example.com'],
    ['id' => 10, 'nome' => 'Alessandra', 'cognome' => 'Verdi', 'email' => 'alessandra@example.com']
];
Route::get('/', function () {
    return response()->redirectTo(\route('public.home'));
});
Route::prefix('public')->group(function () use ($utenti) {
    // Questa route risponde a http://localhost:8000/public
    Route::get('/', function () {
        return response()->json(['message' => 'Benvenuto nella pagina pubblica!'], 200);
    })->name('public.home');
    //http://localhost:8000/public/utenti
    // Questa route risponde a http://localhost:8000/public/utenti
    Route::get('/utenti', function () use ($utenti) {
        // Restituisci i dati degli utenti come JSON
        return response()->json($utenti);
    });

    Route::get('/utente/{id}', function (int $id) use ($utenti) {
        // Restituisci i dati degli utenti come JSON
        $utenteTrovato = Arr::first($utenti, function ($utente) use ($id) {
            return $utente['id'] == $id;
        });

        if ($utenteTrovato) {
            return response()->json($utenteTrovato);
        } else {
            return response()->json(['message' => 'Utente non Trovato'], 404);
        }
    });
});
