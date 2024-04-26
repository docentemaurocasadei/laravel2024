<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TokenController extends Controller
{
    public function getToken(TokenRequest $request) {
        if (Auth::attempt($request->validated())){
            return response()->json([
                'token' => Auth::user()->createToken('ripasso3')->plainTextToken,
            ]);
            
        }else{
            return response()->json([
                'error' => 'utente non riconosciuto',
            ]);
        }
    }
}
