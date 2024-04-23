<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProtectedController extends Controller
{
    public function __construct() {
        $this->middleware('auth:sanctum');
    }
    public function getProtected(){
        return response(
            ['message' => 'risultato protetto ok']
        );
    }
}
