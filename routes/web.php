<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user');
});

Route::post('processForm', [FormController::class, 'getregister']);

//Route::view('form', 'user');