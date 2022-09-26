<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MechanicController as mechCon;
use App\Http\Controllers\TruckController as truckCon;
use App\Http\Controllers\BreakdownController as breakCon;

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

Auth::routes(); // uzkomentuot arba viduj parasyt ['register' => false] ir disabled registration bus

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

Route::prefix('truck')->name('t_')->group(function () {
    Route::get('/', [truckCon::class, 'index'])->name('index');
    Route::get('/create', [truckCon::class, 'create'])->name('create');
    Route::post('/create', [truckCon::class, 'store'])->name('store');
    Route::get('/show/{truck}', [truckCon::class, 'show'])->name('show');
    Route::delete('/delete/{truck}', [truckCon::class, 'destroy'])->name('delete');
    Route::get('/edit/{truck}', [truckCon::class, 'edit'])->name('edit');
    Route::put('/edit/{truck}', [truckCon::class, 'update'])->name('update');
});

Route::prefix('breakdown')->name('b_')->group(function () {
    Route::get('/', [BreakCon::class, 'index'])->name('index');
    Route::get('/trucksList/{mechanic_id}', [BreakCon::class, 'trucksList']);
    Route::post('/create', [BreakCon::class, 'store']);
    Route::get('/list', [BreakCon::class, 'list']);
    Route::delete('/{breakdown}', [BreakCon::class, 'destroy']);
    Route::get('/modal/{breakdown}', [BreakCon::class, 'modal']);
    // Route::put('/edit/{truck}', [BreakCon::class, 'update'])->name('update');
});