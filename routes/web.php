<?php

use App\Http\Controllers\KonselingController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login'); 
    Route::post('/', [SesiController::class, 'login'])->name('login'); 
});

Route::get('/home', function(){
    return redirect('/konseling');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/konseling', [KonselingController::class, 'index'])->name('konseling')->middleware('userAkses:guru_bk');
    Route::get('/siswa', [KonselingController::class, 'siswa'])->name('siswa')->middleware('userAkses:siswa');
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout'); 
});
