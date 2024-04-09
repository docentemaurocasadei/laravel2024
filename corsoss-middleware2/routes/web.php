<?php

use App\Http\Controllers\ProtectedController;
use App\Http\Controllers\ProtectedController2;
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
Route::get('/protected', [ProtectedController::class, 'index'])->name('front.protected');
Route::middleware('protected')->get('/protected2', [ProtectedController2::class, 'index'])->name('front.protected');