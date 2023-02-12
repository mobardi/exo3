<?php
use \App\Http\Controllers\NomsController;
use Illuminate\Support\Facades\Route;
Route::get('/', [NomsController::class, 'liste'])->name('index');
Route::get('/noms/create', [NomsController::class, 'createForm'])->name('noms.create');
Route::post('/noms/create', [NomsController::class, 'create']);
Route::delete('/noms/{id}', [NomsController::class ,'delete'])->name('delete');
Route::get('/noms/edit/{id}', [NomsController::class, 'editForm'])->name('edit');
Route::post('/noms/edit/{id}', [NomsController::class, 'edit'])->name('update');