<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;



Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create']);
Route::post('/events', [EventController::class, 'store']);
Route::get('/contact', function () {
    return view('contact');
});





Route::get('/produtos', function () {

    $busca = request('search');

    return view('products',  ['busca' => $busca]);
});

Route::get('/produto/{id?}', function ($id = null) {
    return view('product', ['id' => $id]);
});
