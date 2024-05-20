<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ClienteController::class)->group(function () {
    Route::get('/sensitive-data', 'index')->name('index');
    Route::get('/sensitive-data/{id}', 'show')->name('index');

});
