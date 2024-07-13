<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\IboxController;
use App\Http\Controllers\IboController;
use App\Http\Controllers\MediaIboController;
use App\Http\Controllers\IbossController;
use App\Http\Controllers\IboTvProController;
use App\Http\Controllers\FourKPlayerController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');

Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 

Route::get('/', [CustomAuthController::class, 'RedirectToLogin']);

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');

Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 

Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('dashboard',[DashBoardController::class, 'index']);

Route::get('add-subadmin',[DashBoardController::class, 'index']);

Route::get('subadmin',[SubAdminController::class, 'index']);

Route::get('add-domain-url',[SubAdminController::class, 'getSubAdmin']);

Route::post('add-domain-urls',[SubAdminController::class, 'storeSubAdmin']);

Route::get('contact-detail',[SubAdminController::class, 'getContact']);

Route::post('contact-details',[SubAdminController::class, 'storeContact']);

Route::get('update-version',[SubAdminController::class, 'getVersion']);

Route::post('update_versions',[SubAdminController::class, 'update_version_store']);



Route::get('subadmin',[IboxController::class, 'index']);

Route::get('ibox-domain-url',[IboxController::class, 'getSubAdmin']);

Route::post('ibox-domain-urls',[IboxController::class, 'storeSubAdmin']);

Route::get('ibox-contact-detail',[IboxController::class, 'getIboxContact']);

Route::post('ibox-contact-details',[IboxController::class, 'storeContact']);

Route::get('ibox-update-version',[IboxController::class, 'getIboxVersion']);

Route::post('ibox-update_versions',[IboxController::class, 'update_version_store']);


Route::get('subadmin',[IboController::class, 'index']);

Route::get('ibo-domain-url',[IboController::class, 'getIboSubAdmin']);

Route::post('ibo-domain-urls',[IboController::class, 'storeIboSubAdmin']);

Route::get('ibo-contact-detail',[IboController::class, 'getIboContact']);

Route::post('ibo-contact-details',[IboController::class, 'storeIboContact']);

Route::get('ibo-update-version',[IboController::class, 'getIboVersion']);

Route::post('ibo-update_versions',[IboController::class, 'update_Ibo_version_store']);



Route::get('upload-file',[IboController::class, 'getUploadFile']);

Route::post('upload-files',[IboController::class, 'storeUploadFile']);


Route::get('mediaIbo-domain-url',[MediaIboController::class, 'getMediaIboSubAdmin']);

Route::post('mediaIbo-domain-urls',[MediaIboController::class, 'storeMediaIboSubAdmin']);

Route::get('mediaIbo-contact-detail',[MediaIboController::class, 'getMediaIboContact']);

Route::post('mediaIbo-contact-details',[MediaIboController::class, 'storeMediaIboContact']);

Route::get('mediaIbo-update-version',[MediaIboController::class, 'getMediaIboVersion']);

Route::post('mediaIbo-update_versions',[MediaIboController::class, 'update_Media_Ibo_version_store']);


Route::get('Ibo-pro-domain-url',[IboTvProController::class, 'getIboTvProSubAdmin']);

Route::post('Ibo-pro-domain-urls',[IboTvProController::class, 'storeIboTvProSubAdmin']);

Route::get('Ibo-pro-contact-detail',[IboTvProController::class, 'getIboTvProContact']);

Route::post('Ibo-pro-contact-details',[IboTvProController::class, 'storeIboTvProContact']);

Route::get('Ibo-pro-update-version',[IboTvProController::class, 'getIboTvProVersion']);

Route::post('Ibo-pro-update_versions',[IboTvProController::class, 'update_Ibo_pro_version_store']);



Route::get('Iboss-domain-url',[IbossController::class, 'getIbossSubAdmin']);

Route::post('Iboss-domain-urls',[IbossController::class, 'storeIbossSubAdmin']);

Route::get('Iboss-contact-detail',[IbossController::class, 'getIbossContact']);

Route::post('Iboss-contact-details',[IbossController::class, 'storeIbossContact']);

Route::get('Iboss-update-version',[IbossController::class, 'getIbossVersion']);

Route::post('Iboss-update_versions',[IbossController::class, 'update_Iboss_version_store']);




Route::get('4kplayer-domain-url',[FourKPlayerController::class, 'getkplayerSubAdmin']);

Route::post('4kplayer-domain-urls',[FourKPlayerController::class, 'store4kplayerSubAdmin']);

Route::get('4kplayer-contact-detail',[FourKPlayerController::class, 'get4kplayerContact']);

Route::post('4kplayer-contact-details',[FourKPlayerController::class, 'storekplayerContact']);

Route::get('4kplayer-update-version',[FourKPlayerController::class, 'get4kplayerVersion']);

Route::post('4kplayer-update_versions',[FourKPlayerController::class, 'update_4kplayer_version_store']);
