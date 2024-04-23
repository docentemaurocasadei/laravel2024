<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class TokenController extends Controller
{
    public function getToken(TokenRequest $request){
        $validateData = $request->validated();
        Log::debug($validateData);
        if (Auth::attempt($validateData)){
            return response()->json(['token'=>Auth::user()->createToken('api')->plainTextToken]);
        }
    }
}
