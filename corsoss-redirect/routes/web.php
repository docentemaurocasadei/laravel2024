<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/news/{id}','/news-new/{id}', 302);
Route::get('/news-new/{id}', function(Request $request){
    return view('message')->with(['message'=>'news n.' . $request->segment(2)]);
});
Route::get('/news2/{id}', function(Request $request, int $id){
    return view('message')->with(['message'=>'news n.' . $id]);
});