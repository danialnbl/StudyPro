<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\PublicationDataController;


Route::get('/', function () {
    return "Well hello there o/. so...";
})->middleware('auth');

//login

Route::get('/login', [UserController::class, 'loginView'])->name('login');

Route::post('/login', [UserController::class, 'authenticate'])->name('login.submit');

Route::get('/verify', [UserController::class, 'verificationView'])->name('verify');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//Register

Route::get('/PlatRegister', [UserController::class, 'PlatinumRegistration'])->name('register');

Route::post('/PlatRegister', [UserController::class, 'PlatinumRegisterPost'])->name('register.submit');

Route::get('/StaffRegister', [UserController::class,'StaffRegistration'])->name('staffReg');

Route::post('/StaffRegister', [UserController::class, 'StaffRegisterPost'])->name('staffReg.submit');

Route::get('/MentorRegister', [UserController::class,'MentorRegistration'])->name('mentorReg');

Route::post('/MentorRegister', [UserController::class,'MentorRegisterPost'])->name('mentorReg.submit');

Route::get('/loginReset', [UserController::class, 'ResetPasswordView']);

Route::get('/publication', [PublicationDataController::class, 'addPublicationDataView']);

Route::get('/loginVerify', [UserController::class, 'VerifyAccountView']);

Route::post('insert-RegData', [UserController::class]);//nak insert data dalam database

Route::get('/PlatinumList',[UserController::class, 'platinumList']);


//dashboard-nnti kena tukr controller
Route ::get('/platinumdashboard',[UserController::class,'PlatDashboard'])->name('PlatDashboard')->middleware('platinum');

Route ::get('/staffdashboard',[UserController::class,'StaffDashboard'])->name('StaffDashboard')->middleware('staff');

Route ::get('/mentordashboard',[UserController::class,'MentorDashboard'])->name('MentorDashboard')->middleware('mentor');


//Expert
Route::get('/expert', [ExpertController::class, 'expertListView']);

Route::get('/expertDetail', [ExpertController::class, 'detailExpertView']);

Route::get('/myexpert', [ExpertController::class, 'myExpertView']);

Route::get('/expertAdd', [ExpertController::class, 'addExpertView'])->name('addExpert');

//Expert Post
Route::post('/expertAdd', [ExpertController::class, 'ExpertAddPost'])->name('expertAdd.submit');

//Profile
Route::get('/platProfile',[UserController::class, 'ProfileView']);

Route::get('/staffProfile',[UserController::class, 'staffProfile']);

Route::get('/mentorProfile',[UserController::class, 'mentorProfile']);
/*Auth::routes([
    'verify'=>true
]);*/







