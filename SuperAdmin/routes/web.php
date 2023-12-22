<?php

use App\Models\NavbarPage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OurProjectController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PortalLoginController;
use App\Http\Controllers\LoginDestinationController;
use App\Http\Controllers\ProjectManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/regis', function () {
    return view('welcome');
});


Route::get('/login-page', function () {
    return view('login-page');
});

// Route::get('/copyright-page', function () {
//     return view('copyright-page');
// });

Route::get('/privacypolicy-page', function () {
    return view('privacypolicy-page');
});

Route::get('/termsofuse-page', function () {
    return view('termsofuse-page');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

/*UPDATE PROFILE */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
    
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
   
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
Route::get('profile',[UserController::class,'profile'])->name('user.profile');
Route::get('settings',[UserController::class,'settings'])->name('user.settings');

Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('userPictureUpdate');
    Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');

});

/*NAVBAR*/
Route::get('/datanavbar',[NavbarController::class, 'index'])->name('datanavbar');
Route::get('/createnavbar',[NavbarController::class, 'create'])->name('createnavbar');
Route::post('/savenavbar',[NavbarController::class, 'store'])->name('savenavbar');
Route::get('/editnavbar/{id}',[NavbarController::class, 'edit'])->name('editnavbar');
Route::post('/updatenavbar/{id}',[NavbarController::class, 'update'])->name('updatenavbar');
Route::get('/deletenavbar/{id}',[NavbarController::class, 'destroy'])->name('deletenavbar');

/*HOME PAGE*/
Route::get('/datahome',[HomeController::class, 'index'])->name('datahome');
Route::get('/createhome',[HomeController::class, 'create'])->name('createhome');
Route::post('/savehome',[HomeController::class, 'store'])->name('savehome');
Route::get('/edithome/{id}',[HomeController::class, 'edit'])->name('edithome');
Route::post('/updatehome/{id}',[HomeController::class, 'update'])->name('updatehome');
Route::get('/deletehome/{id}',[HomeController::class, 'destroy'])->name('deletehome');

// /*ABOUT US PAGE DESCRIPTION*/
Route::get('/dataaboutus',[AboutUsController::class, 'index'])->name('dataaboutus');
Route::get('/createaboutusteam',[AboutUsController::class, 'createaboutteam'])->name('createaboutusteam');
Route::post('/saveaboutusteam',[AboutUsController::class, 'storeaboutteam'])->name('saveaboutusteam');
Route::get('/editaboutusteam/{id}',[AboutUsController::class, 'editaboutteam'])->name('editaboutusteam');
Route::post('/updateaboutusteam/{id}',[AboutUsController::class, 'updateaboutteam'])->name('updateaboutusteam');
Route::delete('/deleteaboutusteam/{id}', [AboutUsController::class, 'destroyaboutteam'])->name('deleteaboutusteam');

// /*ABOUT US PAGE TEAM*/
Route::get('/dataaboutus',[AboutUsController::class, 'index'])->name('dataaboutus');
Route::get('/createaboutusdescription',[AboutUsController::class, 'createaboutusdescription'])->name('createaboutuspagedescription');
Route::post('/saveaboutusdescription',[AboutUsController::class, 'saveaboutusdescription'])->name('saveaboutuspagedescription');
Route::get('/editaboutusdescription/{id}',[AboutUsController::class, 'editaboutdescription'])->name('editaboutusdescription');
Route::post('/updateaboutusdescription/{id}',[AboutUsController::class, 'updateaboutdescription'])->name('updateaboutusdescription');
Route::get('/deleteaboutusdescription/{id}',[AboutUsController::class, 'destroyaboutdescription'])->name('deleteaboutusdescription');

/*OUR PROJECTS*/
Route::get('/dataourproject',[OurProjectController::class, 'index'])->name('dataourproject');
Route::get('/createourproject',[OurProjectController::class, 'create'])->name('createourproject');
Route::post('/saveourproject',[OurProjectController::class, 'store'])->name('saveourproject');
Route::get('/editourproject/{id}',[OurProjectController::class, 'edit'])->name('editourproject');
Route::post('/updateourproject/{id}',[OurProjectController::class, 'update'])->name('updateourproject');
Route::delete('/deleteourproject/{id}', [OurProjectController::class, 'destroy'])->name('deleteourproject');

/*FOOTER*/
Route::get('/datafooter',[FooterController::class, 'index'])->name('datafooter');
Route::get('/createfooter',[FooterController::class, 'create'])->name('createfooter');
Route::post('/simpanfooter',[FooterController::class, 'store'])->name('simpanfooter');
Route::get('/editfooter/{id}',[FooterController::class, 'edit'])->name('editfooter');
Route::post('/updatefooter/{id}',[FooterController::class, 'update'])->name('updatefooter');
Route::get('/deletefooter/{id}',[FooterController::class, 'destroy'])->name('deletefooter');

/*CONTACT US CARD 1*/
Route::get('/datacontactus',[ContactUsController::class, 'index'])->name('datacontactus');
Route::get('/createcontactuscard1',[ContactUsController::class, 'create'])->name('createcontactuscard1');
Route::post('/simpancontactuscard1',[ContactUsController::class, 'store'])->name('simpancontactuscard1');
Route::get('/editcontactuscard1/{id}',[ContactUsController::class, 'edit'])->name('editcontactuscard1');
Route::post('/updatecontactuscard1/{id}',[ContactUsController::class, 'update'])->name('updatecontactuscard1');
Route::get('/deletecontactuscard1/{id}',[ContactUsController::class, 'destroy'])->name('deletecontactuscard1');

/*CONTACT US CARD 2*/
Route::get('/datacontactus',[ContactUsController::class, 'index'])->name('datacontactus');
Route::get('/createcontactuscard2',[ContactUsController::class, 'createcard2'])->name('createcontactuscard2');
Route::post('/savecontactuscard2',[ContactUsController::class, 'storecard2'])->name('savecontactuscard2');
Route::get('/editcontactuscard2/{id}',[ContactUsController::class, 'editcard2'])->name('editcontactuscard2');
Route::post('/updatecontactuscard2/{id}',[ContactUsController::class, 'updatecard2'])->name('updatecontactuscard2');
Route::get('/deletecontactuscard2/{id}',[ContactUsController::class, 'destroycard2'])->name('deletecontactuscard2');

/*PORTAL LOGIN*/
Route::get('/dataportallogin',[PortalLoginController::class, 'index'])->name('dataportallogin');
Route::get('/createportallogin',[PortalLoginController::class, 'create'])->name('createportallogin');
Route::post('/simpanportallogin',[PortalLoginController::class, 'store'])->name('simpanportallogin');
Route::get('/editportallogin/{id}',[PortalLoginController::class, 'edit'])->name('editportallogin');
Route::post('/updateportallogin/{id}',[PortalLoginController::class, 'update'])->name('updateportallogin');
Route::delete('/deleteportallogin/{id}', [PortalLoginController::class, 'destroy'])->name('deleteportallogin');

/*MESSAGE*/
Route::get('/datamessage',[MessageController::class, 'index'])->name('datamessage');
Route::get('/createmessage',[MessageController::class, 'create'])->name('createmessage');
Route::get('/editmessage/{id}',[MessageController::class, 'edit'])->name('editmessage');
Route::post('/updatemessage/{id}',[MessageController::class, 'update'])->name('updatemessage');
Route::delete('/deletemessage/{id}', [MessageController::class, 'destroy'])->name('deletemessage');
Route::get('/change-status/{id}',[MessageController::class, 'changeStatus'])->name('changestatus');
Route::post('/store-form',[MessageController::class, 'store'])->name('store-form');

/*PROJECT MANAGEMENT*/
Route::get('/dataprojectmanagement',[ProjectManagementController::class, 'index'])->name('dataprojectmanagement');
Route::get('/createprojectmanagement',[ProjectManagementController::class, 'create'])->name('createprojectmanagement');
Route::post('/simpanprojectmanagement',[ProjectManagementController::class, 'store'])->name('simpanprojectmanagement');
Route::get('/editprojectmanagement/{id}',[ProjectManagementController::class, 'edit'])->name('editprojectmanagement');
Route::post('/updateprojectmanagement/{id}',[ProjectManagementController::class, 'update'])->name('updateprojectmanagement');
Route::delete('/deleteprojectmanagement/{id}', [ProjectManagementController::class, 'destroy'])->name('deleteprojectmanagement');
// Route::get('/showpms/{id}',[ProjectManagementController::class, 'show'])->name('showpms');
Route::get('/createdashboardpms', [ProjectManagementController::class, 'createDashboard'])->name('createdashboardpms');
Route::post('/createdashboardpms', [ProjectManagementController::class, 'storeDashboard'])->name('storedashboardpms');


/*MESSAGE*/
Route::get('/datamessage',[MessageController::class, 'index'])->name('datamessage');
Route::get('/createmessage',[MessageController::class, 'create'])->name('createmessage');
Route::get('/editmessage/{id}',[MessageController::class, 'edit'])->name('editmessage');
Route::post('/updatemessage/{id}',[MessageController::class, 'update'])->name('updatemessage');
Route::delete('/deletemessage/{id}', [MessageController::class, 'destroy'])->name('deletemessage');
Route::get('/showmessage/{id}',[MessageController::class, 'show'])->name('showmessage');
Route::get('/change-status/{id}',[MessageController::class, 'changeStatus'])->name('changestatus');

Route::get('/',[LandingPageController::class, 'index'])->name('landingpage');
Route::get('/copyrightpage',[LandingPageController::class, 'copyrightpage'])->name('copyrightpage');
Route::get('/privacypolicypage',[LandingPageController::class, 'privacypolicypage'])->name('privacypolicypage');
Route::get('/termsofusepage',[LandingPageController::class, 'termsofusepage'])->name('termsofusepage');
Route::get('/projectdetail/{id}', [LandingPageController::class, 'projectdetail'])->name('projectdetail');
// Route::post('/store-form', [LandingPageController::class, 'store']);
// Route::post('/dashboard', [LandingPageController::class, 'dashboard']);


// Route::get('/test',[TestController::class, 'index'])->name('test');

// Route::get('/mahasiswa',[MahasiswaController::class, 'index']);
// Route::get('/mahasiswa/create',[MahasiswaController::class, 'create']);
// Route::post('/mahasiswa/store',[MahasiswaController::class, 'store']);

// Route::get('add-blog-post-form', [ContactUsSendMessageController::class, 'index']);
// Route::post('store-form', [ContactUsSendMessageController::class, 'store']);
// Route::get('dashboard', [ContactUsSendMessageController::class, 'dashboard']);

// Route::get('/db',[MessageController::class, 'db'])->name('db');
// Route::get('/index',[MessageController::class, 'index'])->name('index');
// Route::post('/store-form',[MessageController::class, 'store'])->name('store-form');
// Route::post('/dashboard',[MessageController::class, 'dashboard'])->name('dashboard');
// Route::get('/change-status/{id}',[MessageController::class, 'changeStatus'])->name('changestatus');


// Route::get('add-blog-post-form', [MessageController::class, 'index']);
// // Route::get('dashboard', [MessageController::class, 'dashboard']);
// Route::post('store-form', [MessageController::class, 'store']);



Route::get('/logindestination',[LoginDestinationController::class, 'index'])->name('logindestination');

Route::get('/login',[LoginController::class, 'index'])->name('login');

