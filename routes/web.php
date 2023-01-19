<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/entrada', function(){
    return view('entrada');
})->name('entrada');
Route::get('/registro', function(){
    return view('registro');
})->name('registro');
Route::get('/inicio', function(){
    return view('inicio');
});

Route::post('registrar', [LoginController::class,'register'])->name('registrar');
Route::post('login', [LoginController::class,'login'])->name('login');