<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\RegisterController;

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



Route::get('index', [RegisterController::class, 'index'])->name('register.index');
Route::get('/', [RegisterController::class, 'index'])->name('register.index');





Route::resource('time', TimeController::class);
Route::get('data', [TimeController::class, 'data'])->name('promo.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['isAdmin'])->group(function () {
    Route::delete('destroy/{time}', [TimeController::class, 'destroy'])->name('time.destroy');
    Route::get('/time/edit-tiktok/{id}', [TimeController::class, 'editTiktok'])->name('time.editTiktok');
    Route::put('/time/update-tiktok/{id}', [TimeController::class, 'updateTiktok'])->name('time.updateTiktok');
    Route::put('update/{register}', [RegisterController::class, 'update'])->name('register.update');
    Route::delete('destroy/{register}', [RegisterController::class, 'destroy'])->name('register.destroy');
    Route::get('edit/{register}', [RegisterController::class, 'edit'])->name('register.edit');
    Route::get('dataregister', [RegisterController::class, 'data'])->name('register.data');
    Route::post('dataregister', [RegisterController::class, 'store'])->name('register.store');
    Route::get('datapromo', [TimeController::class, 'data'])->name('time.data');
});