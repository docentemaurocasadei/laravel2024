<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'fullUrl' => $request->fullUrl(),
            'host' => $request->host(),
            'fullUrlWithQuery' => $request->fullUrlWithQuery(['param' => 'test']),
            'bearerToken' => $request->bearerToken(),
        ]);
    }
}
