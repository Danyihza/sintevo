<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\TenantController as AdminTenant;
use App\Http\Controllers\Admin\AdminController as AdminManager;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumuman;
use App\Http\Controllers\Admin\AdminController;
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

    Route::get('/', [AuthController::class, 'login']);

    // Route::get('/home', [UserController::class, 'index']);
    // Route::get('/add', [UserController::class, 'store']);
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/signout', [AuthController::class, 'signout'])->name('signout');
    Route::any('/signup2', [AuthController::class, 'signup2'])->name('signup2');
    Route::post('/registration', [AuthController::class, 'registration'])->name('registration');
    Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
    Route::get('/download', [FileController::class, 'downloadFile'])->name('download');


    Route::group(['prefix' => 'tenant', 'middleware' => 'loggedin', 'as' => 'user'], function () {
        Route::any('/home', [TenantController::class, 'index'])->name('.home');
        Route::any('/profile/{params?}', [TenantController::class, 'profile'])->name('.profile');
        Route::any('/informasi/{params?}', [TenantController::class, 'informasi'])->name('.informasi');
        Route::any('/monev/{params?}', [TenantController::class, 'monev'])->name('.monev');
        Route::any('/upload_file', [TenantController::class, 'upload_file'])->name('.upload_file');
        Route::any('/buku_kas', [TenantController::class, 'buku_kas'])->name('.buku_kas');
        Route::any('/prestasi', [TenantController::class, 'prestasi'])->name('.prestasi');
        Route::any('/kelulusan', [TenantController::class, 'kelulusan'])->name('.kelulusan');
        Route::get('/changepassword', [TenantController::class, 'changePassword'])->name('.changepassword');
        Route::get('/export/{jenis_monev?}', [TenantController::class, 'exportToExcel'])->name('.export');
        Route::get('/exporttim', [TenantController::class, 'exporttim'])->name('.exporttim');
        Route::get('/exportLampiran', [TenantController::class, 'exportLampiran'])->name('.exportLampiran');
        Route::get('/exportPrestasi', [TenantController::class, 'exportPrestasi'])->name('.exportPrestasi');
        
        Route::post('/changePassword', [AuthController::class, 'changePassword'])->name('.changenewpassword');
        Route::post('/updateProfileUsaha', [TenantController::class, 'updateUsaha'])->name('.updateProfileUsaha');
        Route::post('/tambahAnggota', [TenantController::class, 'tambahAnggota'])->name('.tambahAnggota');
        Route::get('/deleteAnggota/{id_anggota?}', [TenantController::class, 'deleteAnggota'])->name('.deleteAnggota');
        Route::post('/updateAnggota', [TenantController::class, 'updateAnggota'])->name('.updateAnggota');
        Route::post('/monev/tambah/{sub_monev?}', [TenantController::class, 'monev_tambah'])->name('.monevTambah');
        Route::get('/monev/delete/{id_monev?}', [TenantController::class, 'hapusMonev'])->name('.hapusMonev');
        Route::post('/monev/update/monev', [TenantController::class, 'updateMonev'])->name('.updateMonev');
        Route::post('/monev/finansial/update', [TenantController::class, 'updateFinansial'])->name('.updateFinansial');
        Route::get('/monev/finansial/delete/{id_finansial?}', [TenantController::class, 'deleteFinansial'])->name('.deleteFinansial');
        Route::post('/prestasi/tambah', [TenantController::class, 'addPrestasi'])->name('.prestasiTambah');
        Route::get('/prestasi/delete/{id_prestasi?}', [TenantController::class, 'deletePrestasi'])->name('.deletePrestasi');
        Route::post('/prestasi/update', [TenantController::class, 'updatePrestasi'])->name('.updatePrestasi');
        Route::post('/upload_file/tambah', [TenantController::class, 'addFileMonev'])->name('.tambahFileMonev');
        Route::post('/upload_file/update', [TenantController::class, 'updateFileMonev'])->name('.updateFileMonev');
        Route::get('/upload_file/hapus/{id_fileMonev?}', [TenantController::class, 'deleteFileMonev'])->name('.hapusfileMonev');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'loggedin', 'as' => 'admin.'], function () {
        Route::get('/test', [AdminController::class, 'index']);
        Route::post('/updateinformasidashboard', [AdminDashboard::class, 'updateinformasidashboard'])->name('updateinformasidashboard');
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::get('/tenant', [AdminTenant::class, 'index'])->name('listTenants');
        Route::get('/tenant/{id_tenant?}', [AdminTenant::class, 'tenantDetail'])->name('tenant');
        Route::get('/tenant/hapus/{id_tenant?}', [AdminTenant::class, 'hapusSeluruhDataTenant'])->name('hapusTenant');
        Route::get('/adminmanager', [AdminManager::class, 'index'])->name('adminManager');
        Route::post('/adminmanager/tambah', [AdminManager::class, 'addAdmin'])->name('addAdmin');
        Route::get('/adminmanager/hapus/{id_user?}', [AdminManager::class, 'removeAdmin'])->name('removeAdmin');
        Route::get('/pengumuman', [AdminPengumuman::class, 'index'])->name('pengumuman');
        Route::get('/pengumuman/hapus/{id_pengumuman?}', [AdminPengumuman::class, 'removePengumuman'])->name('removePengumuman');
        Route::post('/pengumuman/tambah', [AdminPengumuman::class, 'addPengumuman'])->name('pengumumanTambah');
        Route::get('/juknis', [AdminPengumuman::class, 'petunjukTeknis'])->name('petunjukteknis');
        Route::post('/juknis/tambah', [AdminPengumuman::class, 'addJuknis'])->name('addjuknis');
        Route::get('/juknis/hapus/{id_juknis?}', [AdminPengumuman::class, 'removeJuknis'])->name('removeJuknis');
        Route::post('/kelulusan/tambah', [AdminTenant::class, 'addSertifikat'])->name('addSertifikat');
        Route::get('/kelulusan/hapus/{id_kelulusan?}', [AdminTenant::class, 'removeSertifikat'])->name('removeSertifikat');
        Route::get('/accountpage', [AccountController::class, 'accountPage'])->name('accountPage');
        Route::post('/updateAdmin', [AccountController::class, 'updateAdmin'])->name('updateAdmin');
        

        Route::get('/export/{jenis_monev?}/{id_user?}', [AdminTenant::class, 'exportToExcel'])->name('export');
        Route::get('/exporttenant', [AdminTenant::class, 'exporttenant'])->name('exporttenant');
        Route::get('/exporttim/{id_user?}', [AdminTenant::class, 'exporttim'])->name('exporttim');
        Route::get('/exportLampiran/{id_user?}', [AdminTenant::class, 'exportLampiran'])->name('exportLampiran');
        Route::get('/exportPrestasi/{id_user?}', [AdminTenant::class, 'exportPrestasi'])->name('exportPrestasi');
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
