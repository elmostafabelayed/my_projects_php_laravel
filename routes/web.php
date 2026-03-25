<?php

use App\Http\Controllers\AnnonceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('annonce', AnnonceController::class);