<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MechanicController as mechCon;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('mechanic')->name('m_')->group(function () {
    Route::get('/', [mechCon::class, 'index'])->name('index');
    Route::get('/create', [mechCon::class, 'create'])->name('create');
    Route::post('/create', [mechCon::class, 'store'])->name('store');
    Route::get('/show/{mechanic}', [mechCon::class, 'show'])->name('show');
    Route::delete('/delete/{mechanic}', [mechCon::class, 'destroy'])->name('delete');
    Route::get('/edit/{mechanic}', [mechCon::class, 'edit'])->name('edit');
    Route::put('/edit/{mechanic}', [mechCon::class, 'update'])->name('update');
});