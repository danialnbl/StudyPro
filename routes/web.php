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

Route::get('/loginVerify', [UserController::class, 'VerifyAccountView']);

Route::post('insert-RegData', [UserController::class]);//nak insert data dalam database

Route::get('/PlatinumList',[UserController::class, 'platinumList']);

Route::get('/PlatinumList',[UserController::class, 'showPlatList']);

Route::get('/platEdit/{P_IC}', [UserController::class, 'editPlat'])->name('editPlatinum');

Route::put('/platEdit/{P_IC}', [UserController::class, 'PlatinumEditPost'])->name('platEdit.update');

Route::get('/deleteEdit/{P_IC}', [UserController::class, 'deletePlat'])->name('deletePlatinum');

Route::get('/view/{P_IC}', [UserController::class, 'viewPlat'])->name('viewPlatinum');

//Route::get('delete/{P_IC}',[UserController::class, 'deletePlatList']);


//dashboard-nnti kena tukr controller
Route ::get('/platinumdashboard',[UserController::class,'PlatDashboard'])->name('PlatDashboard')->middleware('platinum');

Route ::get('/staffdashboard',[UserController::class,'StaffDashboard'])->name('StaffDashboard')->middleware('staff');

Route ::get('/mentordashboard',[UserController::class,'MentorDashboard'])->name('MentorDashboard')->middleware('mentor');


//Expert
Route::get('/expert', [ExpertController::class, 'expertListView']);

Route::get('/expertDetail/{E_ID}', [ExpertController::class, 'detailExpertView'])->name('detailExpertView');

Route::get('/myexpert', [ExpertController::class, 'myExpertView'])->name('myExpertView');

Route::get('/expertAdd', [ExpertController::class, 'addExpertView'])->name('addExpert');
Route::get('/expertEdit/{E_ID}', [ExpertController::class, 'editExpertView'])->name('editExpert');

Route::get('/expertReport', [ExpertController::class, 'reportExpertView'])->name('reportExpert');

//Expert Post
Route::post('/expertAdd', [ExpertController::class, 'ExpertAddPost'])->name('expertAdd.submit');
Route::post('/paperAdd/{EP_ID}', [ExpertController::class, 'PaperAddPost'])->name('papertAdd.submit');
Route::put('/expertEdit/{E_ID}', [ExpertController::class, 'ExpertEditPost'])->name('expertEdit.update');

//Expert delete, edit, update
Route::get('/expertDelete/{E_ID}', [ExpertController::class, 'deleteExpert']);
Route::get('/paperDelete/{EP_ID}', [ExpertController::class, 'deletePaper']);
//Route::get('/expertEdit/{E_ID}', [ExpertController::class, 'deletePaper']);

//publication
Route::get('/publication', [PublicationDataController::class, 'addPublicationData']);

//Profile
Route::get('/platProfile',[UserController::class, 'ProfileView']);

//Route::get('/platProfile',[UserController::class, 'showPlatinum']);

Route::get('/staffProfile',[UserController::class, 'staffProfile']);

//Route::get('/staffProfile',[UserController::class, 'showStaff']);

Route::get('/mentorProfile',[UserController::class, 'mentorProfile']);

//Route::get('/mentorProfile',[UserController::class, 'showMentor']);
/*Auth::routes([
    'verify'=>true
]);*/







