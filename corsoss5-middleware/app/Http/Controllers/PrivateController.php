<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivateController extends Controller
{
    public function __construct()
    {
        $this->middleware('richiesta.valida');
    }
    public function index(Request $request){
        if (! $request->accepts(['text/html', 'application/json'])){
            abort(401, 'errore nel tipo di chiamata');
        }
        return response()->json([
            'msg' => 'privata da controller',
            'ip' => $request->ip(),
            'header' => $request->header('X-Header-Name'),
            'bearer' => $request->bearerToken(),
        ]);
    }
    public function indexWithCookie(Request $request){
        return response()->json([
            'msg' => 'privata da indexWithCookie',
        ])->cookie('ss-cookie', 'valore-cookie');
    }
}
