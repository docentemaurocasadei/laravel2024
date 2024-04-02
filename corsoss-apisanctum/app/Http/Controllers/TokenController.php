<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function getToken(Request $request){
        //controllo utente e pwd
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        // Se la validazione fallisce, ritorna un JSON di errore
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        // Tentativo di autenticazione
        // Esegui la validazione e ottieni i dati validati
        $validatedData = $validator->validate();

        // Tentativo di autenticazione
        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];
        if (Auth::attempt($credentials)) {
            // Se le credenziali sono valide, genera un token
            $user = Auth::user();
            $token = $user->createToken('api')->plainTextToken;

            return response()->json(['token' => $token], 200);
        } else {
            // Se le credenziali non sono valide, ritorna un errore
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
