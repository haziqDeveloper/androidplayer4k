<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\IboController;
use App\Http\Controllers\MediaIboController;
use App\Http\Controllers\IbossController;
use App\Http\Controllers\IboTvProController;
use App\Http\Controllers\FourKPlayerController;
use App\Http\Controllers\bobPlayerController;
use App\Http\Controllers\CRKPlayerController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('domain_Url',[SubAdminController::class, 'apiSubAdmin']);

Route::get('contact_detail',[SubAdminController::class, 'apiSubContact']);

Route::get('apk/version/{version}',[SubAdminController::class, 'apiApkVersion']);


Route::get('ibox/domain_Url',[VersionController::class, 'apiSubAdmin']);

Route::get('ibox/contact_detail',[VersionController::class, 'apiSubContact']);

Route::get('ibox/apk/version/{version}',[VersionController::class, 'apiApkVersions']);


Route::get('iboActiveCode/domain_Url',[IboController::class, 'apiIboSubAdmin']);

Route::get('iboActiveCode/contact_detail',[IboController::class, 'apiIboSubContact']);

Route::get('iboActiveCode/apk/version/{version}',[IboController::class, 'apiIboApkVersion']);



Route::get('mediaIbo/domain_Url',[MediaIboController::class, 'apiMediaIboSubAdmin']);
Route::get('mediaIbo/contact_detail',[MediaIboController::class, 'apiMediaIboSubContact']);
Route::get('media/ibo/apk/version/{version}',[MediaIboController::class, 'apiMediaIboApkVersion']);
Route::get('ibo4k/apk/version/{version}',[MediaIboController::class, 'apiMediaIboFourkApkVersion']);


Route::get('bobplayer/domain_Url',[bobPlayerController::class, 'apiBobPlayerSubAdmin']);
Route::get('bobplayer/contact_detail',[bobPlayerController::class, 'apiBobPlayerSubContact']);
Route::get('bobplayer/apk/version/{version}',[bobPlayerController::class, 'apiBobPlayerApkVersion']);


Route::get('IboTvPro/domain_Url',[IboTvProController::class, 'apiIboTvProSubAdmin']);
Route::get('IboTvPro/contact_detail',[IboTvProController::class, 'apiIboTvProSubContact']);
Route::get('IboTvPro/apk/version/{version}',[IboTvProController::class, 'apiIboTvProApkVersion']);



Route::get('Iboss/domain_Url',[IbossController::class, 'apiIbossSubAdmin']);
Route::get('Iboss/contact_detail',[IbossController::class, 'apiIbossSubContact']);
Route::get('Iboss/apk/version/{version}',[IbossController::class, 'apiIbossApkVersion']);


Route::get('4kplayer/domain_Url',[FourKPlayerController::class, 'apifourkPlayerSubAdmin']);
Route::get('4kplayer/contact_detail',[FourKPlayerController::class, 'fourkPlayerSubContact']);
Route::get('4kplayer/apk/version/{version}',[FourKPlayerController::class, 'apifourkPlayerApkVersion']);

Route::get('crplayer/domain_Url',[CRKPlayerController::class, 'apifourkPlayerSubAdmin']);
Route::get('crplayer/contact_detail',[CRKPlayerController::class, 'fourkPlayerSubContact']);
Route::get('crplayer/apk/version/{version}',[CRKPlayerController::class, 'apifourkPlayerApkVersion']);
