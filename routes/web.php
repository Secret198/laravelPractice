<?php

use App\Http\Controllers\ControllerCategories;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("categories", ControllerCategories::class);