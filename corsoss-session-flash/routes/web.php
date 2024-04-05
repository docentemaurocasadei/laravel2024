<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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
Route::get('/session-flash', function(){
    request()->session()->flash('session-flash', 'Attività eseguita correttamente da session-flash'); //con helpers
    Session::flash('status', 'Attività eseguita correttamente'); // con Facade
    return view('session-flash');
});
Route::get('/session', function(){
    return view('session-flash');
});