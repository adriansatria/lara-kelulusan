<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [App\Http\Controllers\Auth::class,'login']);
Route::post('/login', [App\Http\Controllers\Auth::class,'prosesLogin']);
Route::get('/logout', [App\Http\Controllers\Auth::class,'logout']);

Route::get('/', [App\Http\Controllers\Dashboard::class,'index'])->name('dashboard')->middleware('login');

Route::get('/mahasiswa', [App\Http\Controllers\Datamahasiswa::class,'index'])->name('mahasiswa')->middleware('login');
Route::post('/mahasiswa/import', [App\Http\Controllers\Datamahasiswa::class,'import'])->name('mahasiswa/import')->middleware('login');
Route::get('/mahasiswa/export', [App\Http\Controllers\Datamahasiswa::class,'export'])->name('mahasiswa/export')->middleware('login');
Route::get('/mahasiswa/{id}/edit', [App\Http\Controllers\Datamahasiswa::class,'edit'])->name('mahasiswa.edit')->middleware('login');
Route::patch('/mahasiswa/{id}', [App\Http\Controllers\Datamahasiswa::class,'update'])->name('mahasiswa.update')->middleware('login');
Route::delete('/mahasiswa/{id}', [App\Http\Controllers\Datamahasiswa::class,'destroy'])->name('mahasiswa.destroy')->middleware('login');

Route::get('/dosen', [App\Http\Controllers\DosenController::class,'index'])->name('dosen')->middleware('login');
Route::post('/dosen/import', [App\Http\Controllers\DosenController::class,'importdosen'])->name('dosen/import')->middleware('login');
Route::get('/dosen/export', [App\Http\Controllers\DosenController::class,'export'])->name('dosen/export')->middleware('login');


Route::get('/f2s_lulus', [App\Http\Controllers\F2s_lulus::class,'index'])->name('f2s_lulus')->middleware('login');
Route::post('/f2s_lulus/year', [App\Http\Controllers\F2s_lulus::class,'year'])->name('f2s_lulus.year')->middleware('login');
Route::post('/f2s_lulus/export', [App\Http\Controllers\F2s_lulus::class,'export'])->name('f2s_lulus.export')->middleware('login');
Route::get('/f2s_tidaklulus', [App\Http\Controllers\F2s_tidaklulus::class,'index'])->name('f2s_tidaklulus')->middleware('login');
Route::post('/f2s_tidaklulus/year', [App\Http\Controllers\F2s_tidaklulus::class,'year'])->name('f2s_tidaklulus.year')->middleware('login');
Route::post('/f2s_tidaklulus/export', [App\Http\Controllers\F2s_tidaklulus::class,'export'])->name('f2s_tidaklulus.export')->middleware('login');

Route::get('/f1s', [App\Http\Controllers\F1s::class,'index'])->name('f1s')->middleware('login');
Route::post('/f1s/year', [App\Http\Controllers\F1s::class,'year'])->name('f1s.year')->middleware('login');
Route::get('/f1s/create', [App\Http\Controllers\F1s::class,'create'])->name('f1s.create')->middleware('login');
Route::post('/f1s/store', [App\Http\Controllers\F1s::class,'store'])->name('f1s.store')->middleware('login');
Route::get('/f1s/{f1}/edit', [App\Http\Controllers\F1s::class,'edit'])
->name('f1s.edit')->middleware('login');
Route::patch('/f1s/{f1}', [App\Http\Controllers\F1s::class,'update'])
->name('f1s.update')->middleware('login');
Route::delete('/f1s/{f1}', [App\Http\Controllers\F1s::class,'destroy'])
->name('f1s.destroy')->middleware('login');
Route::post('/f1s/export', [App\Http\Controllers\F1s::class,'export'])->name('f1s.export')->middleware('login');

Route::get('/f2s', [App\Http\Controllers\F2s::class,'index'])->name('f2s')->middleware('login');
Route::post('/f2s/year', [App\Http\Controllers\F2s::class,'year'])->name('f2s.year')->middleware('login');
Route::get('/f2s/create', [App\Http\Controllers\F2s::class,'create'])->name('f2s.create')->middleware('login');
Route::post('/f2s/store', [App\Http\Controllers\F2s::class,'store'])->name('f2s.store')->middleware('login');
Route::get('/f2s/{f2}/edit', [App\Http\Controllers\F2s::class,'edit'])
->name('f2s.edit')->middleware('login');
Route::patch('/f2s/{f2}', [App\Http\Controllers\F2s::class,'update'])
->name('f2s.update')->middleware('login');
Route::delete('/f2s/{f2}', [App\Http\Controllers\F2s::class,'destroy'])
->name('f2s.destroy')->middleware('login');
Route::post('/f2s/export', [App\Http\Controllers\F2s::class,'export'])->name('f2s.export')->middleware('login');

Route::get('/f3s', [App\Http\Controllers\F3s::class,'index'])->name('f3s')->middleware('login');
Route::post('/f3s/year', [App\Http\Controllers\F3s::class,'year'])->name('f3s.year')->middleware('login');
Route::get('/f3s/create', [App\Http\Controllers\F3s::class,'create'])->name('f3s.create')->middleware('login');
Route::post('/f3s/store', [App\Http\Controllers\F3s::class,'store'])->name('f3s.store')->middleware('login');
Route::get('/f3s/{f3}/edit', [App\Http\Controllers\F3s::class,'edit'])
->name('f3s.edit')->middleware('login');
Route::patch('/f3s/{f3}', [App\Http\Controllers\F3s::class,'update'])
->name('f3s.update')->middleware('login');
Route::delete('/f3s/{f3}', [App\Http\Controllers\F3s::class,'destroy'])
->name('f3s.destroy')->middleware('login');
Route::post('/f3s/export', [App\Http\Controllers\F3s::class,'export'])->name('f3s.export')->middleware('login');

Route::get('/f4s', [App\Http\Controllers\F4s::class,'index'])->name('f4s')->middleware('login');
Route::post('/f4s/year', [App\Http\Controllers\F4s::class,'year'])->name('f4s.year')->middleware('login');
Route::get('/f4s/create', [App\Http\Controllers\F4s::class,'create'])->name('f4s.create')->middleware('login');
Route::post('/f4s/store', [App\Http\Controllers\F4s::class,'store'])->name('f4s.store')->middleware('login');
Route::get('/f4s/{f4}/edit', [App\Http\Controllers\F4s::class,'edit'])
->name('f4s.edit')->middleware('login');
Route::patch('/f4s/{f4}', [App\Http\Controllers\F4s::class,'update'])
->name('f4s.update')->middleware('login');
Route::delete('/f4s/{f4}', [App\Http\Controllers\F4s::class,'destroy'])
->name('f4s.destroy')->middleware('login');
Route::post('/f4s/export', [App\Http\Controllers\F4s::class,'export'])->name('f4s.export')->middleware('login');

Route::get('/users', [App\Http\Controllers\Users::class,'index'])->name('users')->middleware('login');
Route::get('/users/create', [App\Http\Controllers\Users::class,'create'])->name('users.create')->middleware('login');
Route::post('/users/store', [App\Http\Controllers\Users::class,'store'])->name('users.store')->middleware('login');
Route::get('/users/{user}/edit', [App\Http\Controllers\Users::class,'edit'])
->name('users.edit')->middleware('login');
Route::patch('/users/{user}', [App\Http\Controllers\Users::class,'update'])
->name('users.update')->middleware('login');
Route::delete('/users/{user}', [App\Http\Controllers\Users::class,'destroy'])
->name('users.destroy')->middleware('login');
Route::post('/evaluations/export', [App\Http\Controllers\Evaluations::class,'export'])->name('evaluations.export')->middleware('login');

Route::get('evaluations', [App\Http\Controllers\Evaluations::class,'index'])->name('evaluations')->middleware('login');
Route::post('/evaluations/year', [App\Http\Controllers\Evaluations::class,'year'])->name('evaluations.year')->middleware('login');
Route::get('evaluations/create', [App\Http\Controllers\Evaluations::class,'create'])->name('evaluations.create')->middleware('login');
Route::post('evaluations/store', [App\Http\Controllers\Evaluations::class,'store'])->name('evaluations.store')->middleware('login');
Route::get('evaluations/{user}/edit', [App\Http\Controllers\Evaluations::class,'edit'])
->name('evaluations.edit')->middleware('login');
Route::patch('evaluations/{user}', [App\Http\Controllers\Evaluations::class,'update'])
->name('evaluations.update')->middleware('login');
Route::delete('evaluations/{user}', [App\Http\Controllers\Evaluations::class,'destroy'])
->name('evaluations.destroy')->middleware('login');