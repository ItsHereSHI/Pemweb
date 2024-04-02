<?php

use App\Http\Controllers\logincontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [logincontroller::class,'index'])->name ('modul2');
