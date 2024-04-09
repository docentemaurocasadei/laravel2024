<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ProtectedMiddleware;
use Illuminate\Http\Request;

class ProtectedController extends Controller
{
    public function __construct()
    {
        $this->middleware(ProtectedMiddleware::class);
    }
    public function index(){
        return response()->json(['message' => 'ok'], 200);
    }
}
