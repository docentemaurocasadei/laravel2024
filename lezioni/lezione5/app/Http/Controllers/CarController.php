<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use Illuminate\Http\Request;
use App\Models\Car;
class CarController extends Controller
{
    //per ritornare 1 modello con il suo brand
    //Car::with('brand')->where('id',1)->get()
    //get serve per trasformare la query in una collection (dati)
    //all(), find(), first(), findOrFail(), firstOrFail() -> non richiedono la get()
    //where(), with() .. richiedono la get()
    //per ritornare tutti i modelli
    //Car::all();
    //per ritornare tutti i modelli con il brand
    //Car::with('brand')->get()
    //per recuperare tutti i modelli con hp > 20 e brand = 1
    //Car::query()->where('brand_id', 1)->where('hp', '>', '20')->get()
    //per creare un modello
    //Car::create(['name' => 'Classe A', 'hp' => '115', 'brand_id' => 1]);
/*
 $classeA = App\Models\Car::find(5)                                                            
= App\Models\Car {#6006
    id: 5,
    name: "Classe A",
    hp: "115",
    brand_id: 1,
    created_at: "2024-04-18 09:05:20",
    updated_at: "2024-04-18 09:05:20",
  }

> $classeA->hp = '125'
= "125"

> $classeA->save()
= true
*/
/*
App\Models\Car::where('id',5)->update(['hp' => '125']);
*/
/*
$classeA = App\Models\Car::find(5)                                                            
= App\Models\Car {#6006
    id: 5,
    name: "Classe A",
    hp: "115",
    brand_id: 1,
    created_at: "2024-04-18 09:05:20",
    updated_at: "2024-04-18 09:05:20",
  }

> $classeA->delete()
= true
*/
/*
App\Models\Car::where('id',5)->delete();
*/
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'cars' => Car::query()->with('brand')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        //implementare la validazione
        // $insertedData = $request->only(['name', 'hp', 'brand_id']);
        $insertedData = $request->validated();
        $ret = Car::create($insertedData);
        return response()->json([
            'message' => 'Car created successfully.',
            'id' => $ret
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'car' => Car::query()->with('brand')->where('id', $id)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        //implementare la validazione
        // $updatedData = $request->only(['name', 'hp', 'brand_id']);
        $updatedData = $request->validated();
        $ret = Car::query()->where('id', $id)->update($updatedData);
        return response()->json([
            'message' => 'Car updated successfully.'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ret = Car::query()->where('id', $id)->delete();
        return response()->json([
            'message' => 'Product deleted successfully.'
        ]);
    }
}
