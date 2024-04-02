<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;



Route::get('/', [EventController::class, 'index']);
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::post('/events', [EventController::class, 'store']);
Route::get('/event/{id}', [EventController::class, 'show']);
Route::get('/event/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::patch('/event/update/{id}', [EventController::class, 'update'])->middleware('auth');
Route::delete('/event/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::post('/event/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');
Route::delete('/event/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');
