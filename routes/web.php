<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GuruController;
use APp\Http\Controllers\MapelController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(IndexController::class)->group(function(){
    Route::get('/','index');
    Route::post('/login_admin','loginAdmin');
    Route::post('/login_guru','loginGuru');
    Route::post('/login_siswa','loginSiswa');
    Route::get('/logout','logout');
    Route::get('/home','home');
});

Route::middleware('CheckUserRole:admin')->group(function(){
    Route::controller(GuruController::class)->prefix('guru')->group(function(){
        Route::get('/index','index');
        Route::get('/create','create');
        Route::post('/store','store');
        Route::get('/edit/{guru}','edit');
        Route::post('/update/{guru}','update');
        Route::get('/destroy/{guru}','destroy');
    });
    Route::controller(MapelController::class)->prefix('mapel')->group(function(){
        Route::get('/index','index');
        Route::get('/create','create');
        Route::post('/store','store');
        Route::get('/edit/{mapel}','edit');
        Route::post('/update/{mapel}','update');
        Route::get('/destroy/{mapel}','destroy');
    });
});

//what if i used this
// Route::prefix('guru')->middleware('CheckUserRole:admin')->controller(GuruController::class)->group(function(){
//     Route::get('/index','index');
//     Route::get('/create','create');
//     Route::post('/store','store');
//     Route::get('/edit/{guru}','edit');
//     Route::post('/update/{guru}','update');
//     Route::get('/destroy/{guru}','destroy');
// });
