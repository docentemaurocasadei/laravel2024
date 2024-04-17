<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function getToken(TokenRequest $request){
        $credential = $request->validated();
        if (Auth::attempt($credential)){
            return Auth::user()->createToken(config('app.name'))->plainTextToken;
        }
    }
}
