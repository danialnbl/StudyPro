<?php

use App\Http\Controllers\ExpertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'loginView'])->name('login');

Route::get('/register',[UserController::class, 'newRegisterView']);

Route::get('/expert', [ExpertController::class, 'expertListView']);

Route::get('/expertAdd', [ExpertController::class, 'addExpertView']);

Route::get('/loginReset',[UserController::class, 'ResetPasswordView']);

Route::get('/expert', [ExpertController::class, 'expertListView']);

Route::get('/publication', [PublicationDataController::class, 'addPublicationDataView']);




