<?php

use Illuminate\Support\Facades\Route;

Route::get('/message', function () {
    return view('message')->with(['message' => 'messaggio']);
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/form-cors', function () {
    return view('form-cors');
});

Route::post('/test-cors', function () {
    return view('message')->with(['message' => 'test cors']);
})->name('test-cors');
