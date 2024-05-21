<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::controller(ClienteController::class)->group(function () {
    Route::get('/sensitive-data', 'index')->name('index');
    Route::get('/sensitive-data/show/{id}', 'show')->name('show');
    Route::get('/sensitive-data/edit/{id}', 'edit')->name('edit');
    
    Route::post('/sensitive-data/store','store')->name('store');
    Route::post('/sensitive-data/update/{id}', 'update')->name('update');    
    Route::delete('/sensitive-data/destroy/{id}','destroy')->name('destroy');
});
