<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SantriController;
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

Route::get('/', [SantriController::class, 'index'])->name('santri')->middleware('isLogin');
Route::get('/tambahdata', [SantriController::class, 'tambahdata']);
Route::post('/insertdata', [SantriController::class, 'insertdata']);
Route::get('/tampilkandata/{id}', [SantriController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [SantriController::class, 'updatedata'])->name('updatedata');
Route::get('/delete/{id}', [SantriController::class, 'delete'])->name('delete');
// Export PDF
Route::get('/exportpdf', [SantriController::class, 'exportpdf'])->name('exportpdf');
// login web
Route::get('/login', [LoginController::class, 'loginview'])->name('loginview')->middleware('isTamu');
Route::post('/login/proses', [LoginController::class, 'login'])->name('loginproses')->middleware('isTamu');
//register web
Route::get('/register', [LoginController::class, 'register'])->name('register')->middleware('isTamu');
Route::post('/register/create', [LoginController::class, 'create'])->name('create')->middleware('isTamu');
//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Export Excel
Route::get('/exportexcel', [SantriController::class, 'exportexcel'])->name('exportexcel');
// Import Excel
Route::post('/importexcel', [SantriController::class, 'importexcel'])->name('importexcel');
