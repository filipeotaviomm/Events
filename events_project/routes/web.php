<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;



Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/event/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/event/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/event/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/event/update/{id}', [EventController::class, 'update'])->middleware('auth');
Route::post('/event/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
