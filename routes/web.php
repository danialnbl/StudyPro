<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\PublicationDataController;
use App\Http\Controllers\DraftThesisController;
use App\Http\Controllers\WeeklyFocusController;

Route::get('/', [UserController::class, 'logout']);

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

Route::get('/search', [UserController::class, 'search'])->name('searchPlatinum');

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
//Route::get('/expertPublicationEdit/{E_ID}', [ExpertController::class, 'editExpertView'])->name('editPublicationExpert');

Route::get('/expertReport', [ExpertController::class, 'reportExpertView'])->name('reportExpert');

//Expert Post
Route::post('/expertAdd', [ExpertController::class, 'ExpertAddPost'])->name('expertAdd.submit');
Route::post('/paperAdd/{EP_ID}', [ExpertController::class, 'PaperAddPost'])->name('papertAdd.submit');
Route::put('/expertEdit/{E_ID}', [ExpertController::class, 'ExpertEditPost'])->name('expertEdit.update');
Route::put('/publicationEdit/{PD_ID}', [ExpertController::class, 'PublicationEditPost'])->name('publicationEdit.update');



//Expert delete, edit, update
Route::get('/expertDelete/{E_ID}', [ExpertController::class, 'deleteExpert']);
Route::get('/paperDelete/{EP_ID}', [ExpertController::class, 'deletePaper']);
//Route::get('/expertEdit/{E_ID}', [ExpertController::class, 'deletePaper']);

//publication
// View all publications
Route::get('/Viewpublication', [PublicationDataController::class, 'viewPublicationData'])->name('ViewPublication.view');

// Add publication
Route::get('/publication', [PublicationDataController::class, 'addPublicationData']);
Route::post('/publicationAdd', [PublicationDataController::class, 'store'])->name('publicationAdd.store');

// View own publications
Route::get('/Mypublication', [PublicationDataController::class, 'viewOwnPublicationData'])->name('Mypublication.view');

// Edit and update publication
Route::get('/Editpublication', [PublicationDataController::class, 'editPublicationData'])->name('Editpublications.edit');
Route::put('/Updatepublication', [PublicationDataController::class, 'update'])->name('Updatepublication.update');

// Delete publication
Route::delete('/Delpublication', [PublicationDataController::class, 'destroy'])->name('Delpublication.destroy');



//Profile
Route::get('/platProfile',[UserController::class, 'ProfileView']);

Route::get('/platProfile', [UserController::class, 'showPlatinum'])->name('showPP');

Route::get('/editPlatProfile',[UserController::class, 'updatePlatinum'])->name('editPP');

Route::put('/editPlatEdit', [UserController::class, 'PlatinumProfilePost'])->name('platProfile.update');

Route::get('/staffProfile',[UserController::class, 'staffProfile']);

//Route::get('/staffProfile',[UserController::class, 'showStaff']);

Route::get('/mentorProfile',[UserController::class, 'mentorProfile']);

//Route::get('/mentorProfile',[UserController::class, 'showMentor']);
/*Auth::routes([
    'verify'=>true
]);*/


//weeklyfocus controller
Route::get('/weeklyfocus', [WeeklyFocusController::class, 'index']);
Route::get('/addweeklyfocus', [WeeklyFocusController::class, 'AddWeeklyFocusView']);
Route::get('/viewweeklyfocus', [WeeklyFocusController::class, 'ListWeeklyFocusView']);
Route::post('/submitweeklyfocus', [WeeklyFocusController::class, 'submitWeeklyFocusView'])->name('submitWeeklyFocus');;

//draftthesis controller
Route::get('/viewdraftthesis', [DraftThesisController::class, 'DraftThesisPerformanceView']);
Route::get('/draftthesis/adddraftthesis', [DraftThesisController::class, 'AddDraftThesisView']);
Route::post('/draftthesis/submit', [DraftThesisController::class, 'submitDraftThesis']);
Route::delete('/draftthesis/{draftno}', [DraftThesisController::class, 'DeleteDraftThesis']);




