<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class TokenController extends Controller
{
    public function getToken(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if ($validator->fails()){
            return response()->json(['message' => $validator->errors()], 400);
        }
        $validated = $validator->validate();
        $credenziali = ['email' => $validated['email'], 'password' => $validated['password']];
        if (Auth::attempt($credenziali)){
            return response()->json([
                'token' => Auth::user()->createToken('corsoss-apisanctum2')->plainTextToken
            ], 200) ;
        }else{
            return response()->json(['error' => 'Unauthorized'], 402);
        }
    }
}
