<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:1', 'max:50'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $validatedData = $validator->validate();
        // $validatedData = Arr::only($validatedData, ['name','category_id']); può essere omesso, i dati validati sono già filtrati rispetto alla request
        $category = Category::create($validatedData);
        return response()->json(['message' => 'Categoria creata con successo', 'category' => $category], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:1', 'max:50'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $category = Category::findOrFail($category->id);
        $category->update($request->only('name'));
        return response()->json(['message' => 'Categoria aggiornata con successo', 'category' => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Categoria eliminata con successo', 'category' => $category], 200);
    }
}
