<?php

use App\Http\Controllers\DataFuelController;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|0 
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/fuel', [DataFuelController::class, 'index'])->name('fuel.index');
Route::prefix('/',)->name('data_fuel.')->group(function(){
    Route::get('/fuel', [DataFuelController::class, 'index'])->name('data');
    Route::get('/fuel/create', [DataFuelController::class, 'create'])->name('tambah');
    Route::post('/fuel/create/store', [DataFuelController::class, 'store'])->name('kirim');
    Route::delete('/hapus/{id}', [DataFuelController::class,'destroy'])->name('hapus');
    Route::get('/ubah/{id}', [DataFuelController::class, 'edit'])->name('ubah');
    Route::patch('/ubah/{id}', [DataFuelController::class, 'update'])->name('ubah.proses');


    // Route::get
});

Route::prefix('/')->name('data_akun.')->group(function(){
    Route::get('/data-akun', [DataAkunController::class, 'index'])->name('index');
    Route::get('/create', [DataAkunController::class, 'create'])->name('create');
    Route::post('/create/store', [DataAkunController::class, 'store'])->name('store');
    Route::delete('/delete/{id}', [DataAkunController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}', [DataAkunController::class, 'edit'])->name('edit');
    Route::patch('/edit/{id}', [DataAkunController::class, 'update'])->name('update');
});
// Route::get('/dataakun', [DataAkunController::class, 'index'])->name('data');

// Route::prefix('/',)->name('data_akun.')->group(function(){
//     Route::get
// })




