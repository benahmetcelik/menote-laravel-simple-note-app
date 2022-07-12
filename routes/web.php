<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Home Page
Route::get('/',[\App\Http\Controllers\NotesController::class,'home'])->name('home');


Route::get('/create',[\App\Http\Controllers\NotesController::class,'create'])->name('create');
Route::post('/store',[\App\Http\Controllers\NotesController::class,'store'])->name('store');
Route::get('/{url}',[\App\Http\Controllers\NotesController::class,'show'])->name('show');


