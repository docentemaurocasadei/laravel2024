<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['message' => 'index ok']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:5'],
            'surname' => 'required|min:5',
        ]);
        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $validatedData = $validator->validate();
        return response()->json(['message' => 'store ok']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validatedData = $request->validated();
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:5'],
            'surname' => 'required|min:5',
        ]);
        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $validatedData = $validator->validate();
        return response()->json(['message' => 'update ok', 'request' => $request->validated()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(['message' => 'destroy ok']);
    }
}
