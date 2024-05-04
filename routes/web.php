<?php

use App\Http\Controllers\ExpertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'loginView'])->name('login');

Route::get('/expert', [ExpertController::class, 'expertListView'])->name('expert');


