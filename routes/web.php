<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('SARA/{id}', function ($id) {
    return 'Welcome Back ' . $id;
});