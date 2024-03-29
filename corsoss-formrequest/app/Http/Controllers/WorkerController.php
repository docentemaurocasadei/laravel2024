<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workers.create')->with([

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkerRequest $request)
    {
        return redirect()->route('workers.create')->with('success', 'Record salvato con successo!');
        // return response()->json('controllo avvenuto con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
