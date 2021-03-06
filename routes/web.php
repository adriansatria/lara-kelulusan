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
Route::get('/mahasiswa/export/{year}', [App\Http\Controllers\Datamahasiswa::class,'export'])->name('mahasiswa/export')->middleware('login');
Route::get('/mahasiswa/{id}/edit', [App\Http\Controllers\Datamahasiswa::class,'edit'])->name('mahasiswa.edit')->middleware('login');
Route::patch('/mahasiswa/{id}', [App\Http\Controllers\Datamahasiswa::class,'update'])->name('mahasiswa.update')->middleware('login');
Route::delete('/mahasiswa/{id}', [App\Http\Controllers\Datamahasiswa::class,'destroy'])->name('mahasiswa.destroy')->middleware('login');
Route::post('/mahasiswa/year', [App\Http\Controllers\Datamahasiswa::class,'year'])->name('mahasiswa.year')->middleware('login');

Route::get('/dosen', [App\Http\Controllers\DosenController::class,'index'])->name('dosen')->middleware('login');
Route::post('/dosen/import', [App\Http\Controllers\DosenController::class,'importdosen'])->name('dosen/import')->middleware('login');
Route::get('/dosen/export', [App\Http\Controllers\DosenController::class,'export'])->name('dosen/export')->middleware('login');
Route::get('/dosen/{id}/edit', [App\Http\Controllers\DosenController::class,'edit'])->name('dosen.edit')->middleware('login');
Route::patch('/dosen/{id}', [App\Http\Controllers\DosenController::class,'update'])->name('dosen.update')->middleware('login');
Route::delete('/dosen/{id}', [App\Http\Controllers\DosenController::class,'destroy'])->name('dosen.destroy')->middleware('login');

Route::get('/f2s_lulus', [App\Http\Controllers\F2s_lulus::class,'index'])->name('f2s_lulus')->middleware('login');
Route::post('/f2s_lulus/year', [App\Http\Controllers\F2s_lulus::class,'year'])->name('f2s_lulus.year')->middleware('login');
Route::get('/f2s_lulus/export/{year}/{prodi}', [App\Http\Controllers\F2s_lulus::class,'export'])->name('f2s_lulus.export')->middleware('login');
Route::get('/f2s_tidaklulus', [App\Http\Controllers\F2s_tidaklulus::class,'index'])->name('f2s_tidaklulus')->middleware('login');
// Route::get('/f2s_tidaklulus2', [App\Http\Controllers\F2s_tidaklulus::class,'index2'])->name('f2s_tidaklulus.index2')->middleware('login');
Route::post('/f2s_tidaklulus/year', [App\Http\Controllers\F2s_tidaklulus::class,'year'])->name('f2s_tidaklulus.year')->middleware('login');
Route::get('/f2s_tidaklulus/export/{year}/{prodi}', [App\Http\Controllers\F2s_tidaklulus::class,'export'])->name('f2s_tidaklulus.export')->middleware('login');

Route::get('/f1s', [App\Http\Controllers\F1s::class,'index'])->name('f1s')->middleware('login');
Route::post('/f1s/year', [App\Http\Controllers\F1s::class,'year'])->name('f1s.year')->middleware('login');
Route::get('/f1s/create', [App\Http\Controllers\F1s::class,'create'])->name('f1s.create')->middleware('login');
Route::post('/f1s/store', [App\Http\Controllers\F1s::class,'store'])->name('f1s.store')->middleware('login');
Route::post('/f1s/import', [App\Http\Controllers\F1s::class,'import'])->name('f1s.import')->middleware('login');
Route::get('/f1s/{id}/edit', [App\Http\Controllers\F1s::class,'edit'])
->name('f1s.edit')->middleware('login');
Route::patch('/f1s/{id}', [App\Http\Controllers\F1s::class,'update'])->name('f1s.update')->middleware('login');
Route::delete('/f1s/{id}', [App\Http\Controllers\F1s::class,'destroy'])
->name('f1s.destroy')->middleware('login');
Route::get('/f1s/export/{year}', [App\Http\Controllers\F1s::class,'export'])->name('f1s.export')->middleware('login');

Route::get('/f2s', [App\Http\Controllers\F2s::class,'index'])->name('f2s')->middleware('login');
Route::post('/f2s/year', [App\Http\Controllers\F2s::class,'year'])->name('f2s.year')->middleware('login');
Route::get('/f2s/create', [App\Http\Controllers\F2s::class,'create'])->name('f2s.create')->middleware('login');
Route::post('/f2s/import', [App\Http\Controllers\F2s::class,'import'])->name('f2s.import')->middleware('login');
Route::post('/f2s/store', [App\Http\Controllers\F2s::class,'store'])->name('f2s.store')->middleware('login');
Route::get('/f2s/{f2}/edit', [App\Http\Controllers\F2s::class,'edit'])
->name('f2s.edit')->middleware('login');
Route::patch('/f2s/{f2}', [App\Http\Controllers\F2s::class,'update'])
->name('f2s.update')->middleware('login');
Route::delete('/f2s/{f2}', [App\Http\Controllers\F2s::class,'destroy'])
->name('f2s.destroy')->middleware('login');
Route::get('/f2s/export', [App\Http\Controllers\F2s::class,'export'])->name('f2s.export')->middleware('login');

Route::get('/f3s', [App\Http\Controllers\F3s::class,'index'])->name('f3s')->middleware('login');
Route::post('/f3s/year', [App\Http\Controllers\F3s::class,'year'])->name('f3s.year')->middleware('login');
Route::get('/f3s/create', [App\Http\Controllers\F3s::class,'create'])->name('f3s.create')->middleware('login');
Route::post('/f3s/import', [App\Http\Controllers\F3s::class,'import'])->name('f3s.import')->middleware('login');
Route::post('/f3s/store', [App\Http\Controllers\F3s::class,'store'])->name('f3s.store')->middleware('login');
Route::get('/f3s/{f3}/edit', [App\Http\Controllers\F3s::class,'edit'])
->name('f3s.edit')->middleware('login');
Route::patch('/f3s/{f3}', [App\Http\Controllers\F3s::class,'update'])
->name('f3s.update')->middleware('login');
Route::delete('/f3s/{f3}', [App\Http\Controllers\F3s::class,'destroy'])
->name('f3s.destroy')->middleware('login');
Route::get('/f3s/export', [App\Http\Controllers\F3s::class,'export'])->name('f3s.export')->middleware('login');

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
Route::get('/f4s/export/{year}/{prodi}/{semester}', [App\Http\Controllers\F4s::class,'export'])->name('f4s.export')->middleware('login');

Route::get('/users', [App\Http\Controllers\Users::class,'index'])->name('users')->middleware('login');
Route::get('/users/create', [App\Http\Controllers\Users::class,'create'])->name('users.create')->middleware('login');
Route::post('/users/store', [App\Http\Controllers\Users::class,'store'])->name('users.store')->middleware('login');
Route::get('/users/{user}/edit', [App\Http\Controllers\Users::class,'edit'])
->name('users.edit')->middleware('login');
Route::patch('/users/{user}', [App\Http\Controllers\Users::class,'update'])
->name('users.update')->middleware('login');
Route::delete('/users/{user}', [App\Http\Controllers\Users::class,'destroy'])
->name('users.destroy')->middleware('login');

Route::get('/evaluations/export/{year}', [App\Http\Controllers\Evaluations::class,'export'])->name('evaluations.export')->middleware('login');
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

// Route::get('/rekapipmahasiswa', [App\Http\Controllers\rekapipmahasiswa::class,'rekapipmahasiswa'])->name('rekapipmahasiswa')->middleware('login');

Route::get('/rekapkehadirandosen', [App\Http\Controllers\Rekapkehadirandosen::class,'index'])->name('rekapkehadirandosen')->middleware('login');
Route::post('/rekapkehadirandosen/year', [App\Http\Controllers\Rekapkehadirandosen::class,'year'])->name('rekapkehadirandosen.year')->middleware('login');
Route::get('/rekapkehadirandosen/create', [App\Http\Controllers\Rekapkehadirandosen::class,'create'])->name('rekapkehadirandosen.create')->middleware('login');
Route::post('/rekapkehadirandosen/store', [App\Http\Controllers\Rekapkehadirandosen::class,'store'])->name('rekapkehadirandosen.store')->middleware('login');
Route::get('/rekapkehadirandosen/{f1}/edit', [App\Http\Controllers\Rekapkehadirandosen::class,'edit'])
->name('rekapkehadirandosen.edit')->middleware('login');
Route::patch('/rekapkehadirandosen/{f1}', [App\Http\Controllers\Rekapkehadirandosen::class,'update'])
->name('rekapkehadirandosen.update')->middleware('login');
Route::delete('/rekapkehadirandosen/{f1}', [App\Http\Controllers\Rekapkehadirandosen::class,'destroy'])
->name('rekapkehadirandosen.destroy')->middleware('login');
Route::get('/rekapkehadirandosen/export/{year}', [App\Http\Controllers\Rekapkehadirandosen::class,'export'])->name('rekapkehadirandosen.export')->middleware('login');


Route::get('/rekapipmahasiswa', [App\Http\Controllers\Rekapipmahasiswa::class,'index'])->name('rekapipmahasiswa')->middleware('login');
Route::post('/rekapipmahasiswa/year', [App\Http\Controllers\Rekapipmahasiswa::class,'year'])->name('rekapipmahasiswa.year')->middleware('login');
Route::get('/rekapipmahasiswa/create', [App\Http\Controllers\Rekapipmahasiswa::class,'create'])->name('rekapipmahasiswa.create')->middleware('login');
Route::post('/rekapipmahasiswa/store', [App\Http\Controllers\Rekapipmahasiswa::class,'store'])->name('rekapipmahasiswa.store')->middleware('login');
Route::get('/rekapipmahasiswa/{f2}/edit', [App\Http\Controllers\Rekapipmahasiswa::class,'edit'])
->name('rekapipmahasiswa.edit')->middleware('login');
Route::patch('/rekapipmahasiswa/{f2}', [App\Http\Controllers\Rekapipmahasiswa::class,'update'])
->name('rekapipmahasiswa.update')->middleware('login');
Route::delete('/rekapipmahasiswa/{f2}', [App\Http\Controllers\Rekapipmahasiswa::class,'destroy'])
->name('rekapipmahasiswa.destroy')->middleware('login');
Route::get('/rekapipmahasiswa/export/{year}/{prodi}', [App\Http\Controllers\Rekapipmahasiswa::class,'export'])->name('rekapipmahasiswa.export')->middleware('login');


Route::get('/rekapstatuskelulusan', [App\Http\Controllers\Rekapstatuskelulusan::class,'index'])->name('rekapstatuskelulusan')->middleware('login');
Route::post('/rekapstatuskelulusan/year', [App\Http\Controllers\Rekapstatuskelulusan::class,'year'])->name('rekapstatuskelulusan.year')->middleware('login');
Route::get('/rekapstatuskelulusan/create', [App\Http\Controllers\Rekapstatuskelulusan::class,'create'])->name('rekapstatuskelulusan.create')->middleware('login');
Route::post('/rekapstatuskelulusan/store', [App\Http\Controllers\Rekapstatuskelulusan::class,'store'])->name('rekapstatuskelulusan.store')->middleware('login');
Route::get('/rekapstatuskelulusan/{f3}/edit', [App\Http\Controllers\Rekapstatuskelulusan::class,'edit'])
->name('rekapstatuskelulusan.edit')->middleware('login');
Route::patch('/rekapstatuskelulusan/{f3}', [App\Http\Controllers\Rekapstatuskelulusan::class,'update'])
->name('rekapstatuskelulusan.update')->middleware('login');
Route::delete('/rekapstatuskelulusan/{f3}', [App\Http\Controllers\Rekapstatuskelulusan::class,'destroy'])
->name('rekapstatuskelulusan.destroy')->middleware('login');
Route::get('/rekapstatuskelulusan/export/{year}/{prodi}/{semester}', [App\Http\Controllers\Rekapstatuskelulusan::class,'export'])->name('rekapstatuskelulusan.export')->middleware('login');
