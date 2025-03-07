<?php


use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DosenController;

use App\Models\Matkul;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


//Route::get('/', function () {
  //  return view('layout');
//});

// Route::resource('Mahasiswa', MahasiswaController::class);
// Route::get('/',[HomeController::class,'dashboard']);

// Route::get('/', [WelcomeController::class, 'index']);
Route::get('/welcome', function (){
    return view('welcome');
});



Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard',function(){
    return view('dashboard');
});

Route::get('/layout',function(){
  return view('layout');
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('matkul', MatkulController::class);
Route::resource('absensi', AbsensiController::class);
Route::resource('dosen', DosenController::class);


Route::get('/login', [LoginController::class, 'login_form'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

