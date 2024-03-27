<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/csrf',function(){
    return csrf_token();
});
Route::post('/mypost', function(Request $request){
    return response()->json(['message' => 'mypost', 'request' => request()->all()]);
});
Route::patch('/mypatch/{id}', function(Request $request, $id) {
    $data = $request->all();
    return response()->json(['message' => 'Dati PATCH ricevuti', 'data' => $data]);
});
Route::delete('/mydelete/{id}', function(Request $request, int $id){
    return response()->json(['message' => 'myput', 'id' => $id]);
});