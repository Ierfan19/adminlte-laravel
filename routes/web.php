<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggajianController;

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
    return view('index');
})->middleware('auth');



Route::middleware('auth')->group(function(){
    
});
Route::group(['prefix' => 'jabatan'], function(){
    Route::get('', [JabatanController::class, 'index']);
    Route::get('/create', [JabatanController::class, 'create']);
    Route::get('/store', [JabatanController::class, 'store']);
    Route::get('/read', [JabatanController::class, 'read']);
    Route::get('/edit/{id}', [JabatanController::class, 'show']);
    Route::get('/update', [JabatanController::class, 'update']);
    Route::get('/delete/{id}', [JabatanController::class, 'destroy']);
});
Route::group(['prefix' => 'golongan'], function(){
    Route::get('', [GolonganController::class, 'index']);
    Route::get('/create', [GolonganController::class, 'create']);
    Route::get('/store', [GolonganController::class, 'store']);
    Route::get('/read', [GolonganController::class, 'read']);
    Route::get('/edit/{id}', [GolonganController::class, 'show']);
    Route::get('/update', [GolonganController::class, 'update']);
    Route::get('/delete/{id}', [GolonganController::class, 'destroy']);
});
Route::group(['prefix' => 'pegawai'], function(){
    Route::get('', [PegawaiController::class, 'index']);
    Route::get('/create', [PegawaiController::class, 'create']);
    Route::get('/store', [PegawaiController::class, 'store']);
    Route::get('/read', [PegawaiController::class, 'read']);
    Route::get('/edit/{id}', [PegawaiController::class, 'show']);
    Route::get('/update', [PegawaiController::class, 'update']);
    Route::get('/delete/{id}', [PegawaiController::class, 'destroy']);
});


Route::group(['prefix' => 'penggajian'], function(){
    Route::get('', [PenggajianController::class, 'index']);
    Route::get('/create', [PenggajianController::class, 'create']);
    Route::post('/store', [PenggajianController::class, 'store']);
    Route::get('/cari/nip', [PenggajianController::class, 'carinip'])->name('carinip');
    Route::get('/cari/jabatan', [PenggajianController::class, 'carijabatan'])->name('carijabatan');
    Route::get('/cari/potongan', [PenggajianController::class, 'caripotongan'])->name('caripotongan');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
