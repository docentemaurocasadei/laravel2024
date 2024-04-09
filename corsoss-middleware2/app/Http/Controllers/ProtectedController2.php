<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ProtectedMiddleware;
use Illuminate\Http\Request;

class ProtectedController2 extends Controller
{
    public function index(){
        return response()->json(['message' => 'ok'], 200);
    }
}
