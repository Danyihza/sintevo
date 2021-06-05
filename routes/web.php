<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\TenantController as AdminTenant;
use App\Http\Controllers\Admin\AdminController as AdminManager;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumuman;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\Auth as ApiAuth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'index']);

Route::get('/home', [UserController::class, 'index']);
Route::get('/add', [UserController::class, 'store']);
Route::get('/signup', [AuthController::class, 'signup']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/signout', [AuthController::class, 'signout']);
Route::any('/signup2', [AuthController::class, 'signup2']);
Route::post('/registration', [AuthController::class, 'registration']);
Route::post('/signin', [AuthController::class, 'signin']);
Route::get('/download', [FileController::class, 'downloadFile']);

Route::group(['prefix' => 'tenant', 'middleware' => 'loggedin', 'as' => 'user'], function () {
    Route::any('/home', [TenantController::class, 'index']);
    Route::any('/profile/{params?}', [TenantController::class, 'profile']);
    Route::any('/informasi/{params?}', [TenantController::class, 'informasi']);
    Route::any('/monev/{params?}', [TenantController::class, 'monev']);
    Route::any('/upload_file', [TenantController::class, 'upload_file']);
    Route::any('/buku_kas', [TenantController::class, 'buku_kas']);
    Route::any('/prestasi', [TenantController::class, 'prestasi']);
    Route::any('/kelulusan', [TenantController::class, 'kelulusan']);

    Route::post('/updateProfileUsaha', [TenantController::class, 'updateUsaha']);
    Route::post('/tambahAnggota', [TenantController::class, 'tambahAnggota']);
    Route::get('/deleteAnggota/{id_anggota?}', [TenantController::class, 'deleteAnggota']);
    Route::post('/updateAnggota', [TenantController::class, 'updateAnggota']);
    Route::post('/monev/tambah/{sub_monev}', [TenantController::class, 'monev_tambah']);
    Route::post('/prestasi/tambah', [TenantController::class, 'addPrestasi']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'loggedin', 'as' => 'admin.'], function() {
    Route::get('/test', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminDashboard::class, 'index']);
    Route::get('/tenant', [AdminTenant::class, 'index'])->name('listTenants');
    Route::get('/tenant/{id_tenant}', [AdminTenant::class, 'tenantDetail']);
    Route::get('/adminmanager', [AdminManager::class, 'index']);
    Route::get('/pengumuman', [AdminPengumuman::class, 'index']);
});


// Route::group(['prefix' => 'api'], function () {
//     Route::post('/getEmail', [ApiAuth::class, 'getEmail']);
//     Route::post('/getProdi', [ApiData::class, 'getProdi']);
//     Route::post('/getStatus', [ApiData::class, 'getStatus']);
//     Route::post('/getDetailAnggota/{id_anggota?}', [ApiData::class, 'getAnggota']);
//     Route::get('/postFeedback', [ApiData::class, 'addFeedback'])->name('postFeedback');
// });


// Route::view('/tenant', 'tenant/home');
// Route::view('/signup2', 'signup2');
Route::get('/test', [TenantController::class, 'test']);