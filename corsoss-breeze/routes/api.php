<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // Public routes of authtication
    Route::controller(LoginRegisterController::class)->group(function() {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
    });

    // Protected routes of product and logout
    Route::middleware('auth:sanctum')->group( function () {
        Route::post('/logout', [LoginRegisterController::class, 'logout']);
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



