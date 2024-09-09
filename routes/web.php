<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniExcelController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\StaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserExcelController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
// 	return view('welcome');
// });
Route::get('/', fn() => redirect('/beranda'));
// Route::view('/mahasiswa/exportPage', 'mahasiswa.exportPage');
Route::view('/mahasiswa/importPage', 'mahasiswa.importPage');
Route::view('/login', 'page.login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/mahasiswa/import', [MahasiswaController::class, 'import'])->name('mahasiswa.import');
Route::get('/mahasiswa/export', [MahasiswaController::class, 'export'])->name('mahasiswa.export');
Route::view('/stase/importPage', 'stase.importPage');
Route::post('/stase/import', [StaseController::class, 'import'])->name('stase.import');
Route::get('/stase/export', [StaseController::class, 'export'])->name('stase.export');
// Route::get('/users/action/exports', [UserExcelController::class, 'exports'])->name('users.action.exports');
// Route::get('/alumnis/action/exports', [AlumniExcelController::class, 'exports'])->name('alumnis.action.exports');
// Route::post('/alumnis/action/imports', [AlumniExcelController::class, 'imports'])->name('alumnis.action.imports');
Route::view('/beranda','page.beranda');
Route::post('/jadwal/validate-mhs', [JadwalController::class, 'validateMhs'])->name('jadwal.validateMhs');
Route::post('/jadwal/validate-stase', [JadwalController::class, 'validateStase'])->name('jadwal.validateStase');
Route::resource('/users', UserController::class);
Route::resource('/mahasiswa', MahasiswaController::class);
Route::resource('/stase', StaseController::class);
Route::resource('/jadwal', JadwalController::class);
Route::resource('/alumni', AlumniController::class);