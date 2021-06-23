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
    
    Route::post('/getEmail', [ApiAuth::class, 'getEmail']);
    Route::post('/getProdi', [ApiData::class, 'getProdi']);
    Route::post('/getStatus', [ApiData::class, 'getStatus']);
    Route::post('/getDetailAnggota/{id_anggota?}', [ApiData::class, 'getAnggota'])->name('getDetailAnggota');
    Route::get('/postFeedback', [ApiData::class, 'addFeedback'])->name('postFeedback');
    Route::get('/editPrestasi/{id_prestasi?}', [ApiData::class, 'editPrestasi'])->name('editPrestasi');
    Route::get('/getFinansial/{id_finansial?}', [ApiData::class, 'getFinansial'])->name('getFinansial');
    Route::get('/getFileMonev/{id_filemonev?}', [ApiData::class, 'getFileMonev'])->name('getFileMonev');
    Route::get('/getPrestasi/{id_prestasi?}', [ApiData::class, 'getPrestasi'])->name('getPrestasi');