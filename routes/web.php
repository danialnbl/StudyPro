<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\PublicationDataController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'loginView'])->name('login');

Route::get('/register', [UserController::class, 'newRegisterView']);

Route::get('/expert', [ExpertController::class, 'expertListView']);

Route::get('/myexpert', [ExpertController::class, 'myExpertView']);

Route::get('/expertAdd', [ExpertController::class, 'addExpertView']);

Route::get('/loginReset', [UserController::class, 'ResetPasswordView']);

Route::get('/publication', [PublicationDataController::class, 'addPublicationDataView']);

Route::get('/loginVerify', [UserController::class, 'VerifyAccountView']);

Route::post('insert-RegData', [UserController::class]);//nak insert data dalam database

Route::get('/PlatinumList',[UserController::class, 'platinumList']);




