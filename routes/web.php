<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\PublicationDataController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'loginView'])->name('login');

Route::post('/login', [UserController::class, 'loginPost'])->name('login.submit');

Route::get('/verify', [UserController::class, 'verificationView'])->name('verify');

Route::get('/PlatRegister', [UserController::class, 'PlatinumRegistration'])->name('register');

Route::post('/PlatRegister', [UserController::class, 'registerPost'])->name('register.submit');

Route::get('/expert', [ExpertController::class, 'expertListView']);

Route::get('/myexpert', [ExpertController::class, 'myExpertView']);

Route::get('/expertAdd', [ExpertController::class, 'addExpertView']);

Route::get('/loginReset', [UserController::class, 'ResetPasswordView']);

Route::get('/publication', [PublicationDataController::class, 'addPublicationDataView']);

Route::get('/loginVerify', [UserController::class, 'VerifyAccountView']);

Route::post('insert-RegData', [UserController::class]);//nak insert data dalam database

Route::get('/PlatinumList',[UserController::class, 'platinumList']);

Route::get('/profile',[UserController::class, 'ProfileView']);

Route::get('/EditRegister',[UserController::class,'']);

/*Auth::routes([
    'verify'=>true
]);*/







