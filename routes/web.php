<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MatriksController;

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
    Route::get('/',[AlternativeController::class, 'index'])->name('home');
    Route::get('kriteria', [KriteriaController::class, 'kriteria'])->name('kriteria');
    Route::get('kriteria/add', [KriteriaController::class, 'addkriteria'])->name('kriteria.add');
    Route::post('kriteria/post', [KriteriaController::class, 'postkriteria'])->name('kriteria.post');
    Route::get('kriteria/{id}', [KriteriaController::class, 'editkriteria'])->name('kriteria.edit');
    Route::post('kriteria/edit', [KriteriaController::class, 'updatekriteria'])->name('kriteria.update');
    Route::get('kriteria/delete/{id}', [KriteriaController::class, 'deletekriteria'])->name('kriteria.delete');
    Route::get('alternative', [AlternativeController::class, 'alternative'])->name('alternative');
    Route::get('matriks', [MatriksController::class, 'matriks'])->name('matriks');
    Route::get('nilai', [MatriksController::class, 'nilai'])->name('nilai');
    Route::get('alternative/add', [AlternativeController::class, 'addalternative'])->name('alternative.add');
    Route::post('alternative/post', [AlternativeController::class, 'postalternative'])->name('alternative.post');
    Route::get('alternative/{id}', [AlternativeController::class, 'editalternative'])->name('alternative.edit');
    Route::post('alternative/edit', [AlternativeController::class, 'updatealternative'])->name('alternative.update');
    Route::get('alternative/delete/{id}', [AlternativeController::class, 'deletealternative'])->name('alternative.delete');
   
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


