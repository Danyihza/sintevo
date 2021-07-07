<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Data as ApiData;
use App\Http\Controllers\Api\Auth as ApiAuth;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['prefix' => 'api'], function () {
//     Route::post('/getEmail', [ApiAuth::class, 'getEmail']);
//     Route::post('/getProdi', [ApiData::class, 'getProdi']);
//     Route::post('/getStatus', [ApiData::class, 'getStatus']);
//     Route::post('/getDetailAnggota/{id_anggota?}', [ApiData::class, 'getAnggota']);
// });
    
    Route::post('/getEmail', [ApiAuth::class, 'getEmail'])->name('getEmail');
    Route::post('/getProdi', [ApiData::class, 'getProdi'])->name('getProdi');
    Route::post('/getStatus', [ApiData::class, 'getStatus'])->name('getStatus');
    Route::post('/getDetailAnggota/{id_anggota?}', [ApiData::class, 'getAnggota'])->name('getDetailAnggota');
    Route::get('/postFeedback', [ApiData::class, 'addFeedback'])->name('postFeedback');
    Route::get('/postFileMonevFeedback', [ApiData::class, 'addFileMonevFeedback'])->name('postFileMonevFeedback');
    Route::get('/editPrestasi/{id_prestasi?}', [ApiData::class, 'editPrestasi'])->name('editPrestasi');
    Route::get('/getFinansial/{id_finansial?}', [ApiData::class, 'getFinansial'])->name('getFinansial');
    Route::get('/getFileMonev/{id_filemonev?}', [ApiData::class, 'getFileMonev'])->name('getFileMonev');
    Route::get('/getPrestasi/{id_prestasi?}', [ApiData::class, 'getPrestasi'])->name('getPrestasi');
    Route::post('/checkPassword', [ApiAuth::class, 'checkPassword'])->name('checkPassword');
    Route::get('/getavatar/{id_user?}', [ApiData::class, 'getAvatar'])->name('getAvatar');
    Route::get('/getpengumuman', [ApiData::class, 'getpengumuman'])->name('getpengumuman');
    Route::get('/getMonev/{id_monev?}', [ApiData::class, 'getMonev'])->name('getMonev');