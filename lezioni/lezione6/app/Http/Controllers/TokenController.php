<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function getToken(TokenRequest $request){
        $validatedData = $request->validated();
        if (Auth::attempt($validatedData)){
            return response()->json([
                'token' => Auth::user()->createToken('lezione6')->plainTextToken
            ], 200) ;
        }else{
            return response()->json(['error' => 'Unauthorized'], 402);
        }
    }
}
