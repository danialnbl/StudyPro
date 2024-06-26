<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\PublicationDataController;
use App\Http\Controllers\DraftThesisController;
use App\Http\Controllers\WeeklyFocusController;
use App\Http\Controllers\ManageCRMPController;

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

Route::get('/RegList',[UserController::class, 'regList']);

Route::get('/RegList',[UserController::class, 'showRegList']);

Route::get('/viewReg/{P_IC}', [UserController::class, 'viewReg'])->name('viewReg');

Route::get('/searchReg', [UserController::class, 'searchReg'])->name('searchReg');

//Route::get('delete/{P_IC}',[UserController::class, 'deletePlatList']);


//dashboard-nnti kena tukr controller
Route ::get('/platinumdashboard',[UserController::class,'PlatDashboard'])->name('PlatDashboard')->middleware('platinum');
//Route::get('/platinumdashboard', [UserController::class, 'countExpert'])->name('countExpert');

Route ::get('/staffdashboard',[UserController::class,'StaffDashboard'])->name('StaffDashboard')->middleware('staff');

Route ::get('/mentordashboard',[UserController::class,'MentorDashboard'])->name('MentorDashboard')->middleware('mentor');

Route ::get('/crmpdashboard',[UserController::class,'CRMPDashboard'])->name('CRMPDashboard');


//Expert
Route::get('/expert', [ExpertController::class, 'expertListView'])->middleware('mentorPlat');

Route::get('/expertDetail/{E_ID}', [ExpertController::class, 'detailExpertView'])->name('detailExpertView')->middleware('mentorPlat');

Route::get('/myexpert', [ExpertController::class, 'myExpertView'])->name('myExpertView')->middleware('platinum');

Route::get('/expertAdd', [ExpertController::class, 'addExpertView'])->name('addExpert')->middleware('platinum');
Route::get('/expertEdit/{E_ID}', [ExpertController::class, 'editExpertView'])->name('editExpert')->middleware('platinum');
//Route::get('/expertPublicationEdit/{E_ID}', [ExpertController::class, 'editExpertView'])->name('editPublicationExpert');

Route::get('/expertReport', [ExpertController::class, 'reportExpertView'])->name('reportExpert')->middleware('mentorPlat');

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
Route::post('/publicationAdd', [PublicationDataController::class, 'storePublication'])->name('publicationAdd.store');

// View own publications
Route::get('/Mypublication', [PublicationDataController::class, 'viewOwnPublicationData'])->name('Mypublication.view');

// Edit and update publication

Route::get('/Editpublication/{id}', [PublicationDataController::class, 'editPublicationDataView'])->name('Editpublication');
Route::put('/Editpublication/{id}', [PublicationDataController::class, 'update'])->name('Editpublication.update');

// Delete publication
Route::delete('/Mypublication{id}', [PublicationDataController::class, 'destroy'])->name('Delpublication');

//search Publication
Route::get('/Searchpublication', [PublicationDataController::class, 'search'])->name('SearchPublication.search');
Route::get('/SearchPublicationM', [PublicationDataController::class, 'searchMentor'])->name('SearchPublicationM.search');
Route::get('/Mentorsearching', [PublicationDataController::class, 'Mentorsearch'])->name('SearchPublicationMentor.search');
// View publications by Platinum members for mentors
Route::get('/ViewpublicationMentor', [PublicationDataController::class, 'viewPublicationDataM'])->name('ViewPublicationMentor.view');

// Generate report
Route::get('/GenerateReportPublication', [PublicationDataController::class, 'generateReportView'])->name('GenerateReportPublication.view');
Route::post('/GenerateReportPublication', [PublicationDataController::class, 'generateReport'])->name('GenerateReportPublication.generate');
Route::get('/publicationReport', [UserController::class, 'publicationReport'])->name('reportPublication');

//Profile
Route::get('/platProfile',[UserController::class, 'ProfileView']);
Route::get('/platProfile', [UserController::class, 'showPlatinum'])->name('showPP');
Route::get('/editPlatProfile',[UserController::class, 'updatePlatinum'])->name('editPP');
Route::put('/editPlatEdit', [UserController::class, 'PlatinumProfilePost'])->name('platProfile.update');
Route::get('/searchPlat',[UserController::class, 'searchPlat'])->name('searchProfile');
Route::get('/detail/{P_IC}', [UserController::class, 'detailPlat'])->name('detailPlatinum');

Route::get('/staffProfile',[UserController::class, 'staffProfile']);
Route::get('/staffProfile', [UserController::class, 'showStaff'])->name('showST');
Route::get('/editStaffProfile',[UserController::class, 'updateStaff'])->name('editST');
Route::put('/StaffEdit', [UserController::class, 'StaffProfilePost'])->name('staff.update');
Route::get('/searchPlatST',[UserController::class, 'searchPlatST'])->name('searchProST');
Route::get('/detailST/{P_IC}', [UserController::class, 'detailPlatST'])->name('detailPlatST');
Route::get('/detailStaffST/{S_IC}', [UserController::class, 'detailStaffST'])->name('detailStaffST');
Route::get('/detailMentorST/{M_IC}', [UserController::class, 'detailMentorST'])->name('detailMentorST');
Route::get('/staffReport', [UserController::class, 'reportStaffView'])->name('reportStaff');

Route::get('/mentorProfile',[UserController::class, 'mentorProfile']);
Route::get('/mentorProfile', [UserController::class, 'showMentor'])->name('showMT');
Route::get('/editMentorProfile',[UserController::class, 'updateMentor'])->name('editMT');
Route::put('/MentorEdit', [UserController::class, 'MentorProfilePost'])->name('mentor.update');
Route::get('/searchPlatMT',[UserController::class, 'searchPlatMT'])->name('searchProMT');
Route::get('/detailMT/{P_IC}', [UserController::class, 'detailPlatMT'])->name('detailPlatMT');
Route::get('/detailStaffMT/{S_IC}', [UserController::class, 'detailStaffMT'])->name('detailStaffMT');
Route::get('/detailMentorMT/{M_IC}', [UserController::class, 'detailMentorMT'])->name('detailMentorMT');
Route::get('/mentorReport', [UserController::class, 'reportMentorView'])->name('reportMentor');

//Route::get('/mentorProfile',[UserController::class, 'showMentor']);
/*Auth::routes([
    'verify'=>true
]);*/


//weeklyfocus controller
Route::get('/addweeklyfocus', [WeeklyFocusController::class, 'AddWeeklyFocusView'])->name('WeeklyFocus.add');
Route::get('/viewweeklyfocus', [WeeklyFocusController::class, 'ListWeeklyFocusView'])->name('WeeklyFocus.view');
Route::post('/submitweeklyfocus', [WeeklyFocusController::class, 'submitWeeklyFocusView'])->name('WeeklyFocus.submit');
Route::delete('/weeklyfocus/{wf_id}', [WeeklyFocusController::class, 'DeleteWeeklyFocus'])->name('WeeklyFocus.delete');
Route::get('/weeklyfocus/{wf_id}/edit', [WeeklyFocusController::class, 'EditWeeklyFocusForm'])->name('WeeklyFocus.editForm');
Route::put('/weeklyfocus/{wf_id}', [WeeklyFocusController::class, 'EditWeeklyFocusView'])->name('WeeklyFocus.edit');
Route::get('/searchweeklyfocus', [WeeklyFocusController::class, 'SearchWeeklyFocusView'])->name('WeeklyFocus.search');
Route::get('/feedbackwf',[WeeklyFocusController::class,'FeedbackWFView'])->name('WeeklyFocus.feedback');
Route::get('/listplatinumwf',[WeeklyFocusController::class,'ListPlatinumWFView'])->name('WeeklyFocus.platinum');

//draftthesis controller
Route::get('/viewdraftthesis', [DraftThesisController::class, 'DraftThesisPerformanceView'])->name('DraftThesis.view');
Route::get('/draftthesis/adddraftthesis', [DraftThesisController::class, 'AddDraftThesisView']);
Route::post('/draftthesissubmit', [DraftThesisController::class, 'submitDraftThesis'])->name('DraftThesis.submit');
Route::delete('/draftthesis/{draftid}', [DraftThesisController::class, 'DeleteDraftThesis'])->name('DraftThesis.delete');
Route::get('/draftthesis/{draftid}/edit', [DraftThesisController::class, 'EditDraftThesisForm'])->name('DraftThesis.editForm');
Route::put('/draftthesis/{draftid}', [DraftThesisController::class, 'EditDraftThesisView'])->name('DraftThesis.edit');
Route::get('/searchdraftthesis', [DraftThesisController::class, 'SearchDraftThesisView'])->name('DraftThesis.search');
Route::get('/feedbackdt',[DraftThesisController::class,'FeedbackDTView'])->name('DraftThesis.feedback');
Route::get('/listplatinumdt',[DraftThesisController::class,'ListPlatinumDTView'])->name('DraftThesis.platinum');

//crmp controller
Route::get('/crmplist',[ManageCRMPController::class, 'CRMPListView']);
Route::get('/crmpassign',[ManageCRMPController::class, 'CRMPAssignView']);
Route::post('/crmpassign/update', [ManageCRMPController::class, 'updateCRMPStatus']);
Route::get('/platinumgroup',[ManageCRMPController::class, 'PlatinumGroupView']);
Route::get('/searchplatinum',[ManageCRMPController::class, 'SearchPlatinumView']);
Route::get('/crmpprofile',[ManageCRMPController::class, 'CRMPProfileView'])->name('crmp.profile');
Route::get('/crmpreport',[ManageCRMPController::class, 'CRMPReport'])->name('generatecrmpreport');;
Route::get('/generatecrmppdf', [ManageCRMPController::class, 'generateReportCRMP']);
Route::get('/mycrmp', [ManageCRMPController::class, 'MyCRMP']);

//integrate module 1 ,2,3
Route::get('/showDetail/{P_IC}', [UserController::class, 'showDetail'])->name('showDetail');

Route::get('/showDetailMT/{P_IC}', [UserController::class, 'showDetailPlat'])->name('showDetailMT');



