<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

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



Route::get('/register', [AuthController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'regist'])->middleware('guest')->name('register.perform');
Route::get('/login', [AuthController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.perform');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/',[PageController::class, 'index'])->name('home');
    Route::get('kriteria', [PageController::class, 'kriteria'])->name('kriteria');
    Route::get('alternative', [PageController::class, 'alternative'])->name('alternative');
    Route::get('matriks', [PageController::class, 'matriks'])->name('matriks');
    Route::get('nilai', [PageController::class, 'nilai'])->name('nilai');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


