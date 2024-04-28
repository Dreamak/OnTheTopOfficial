<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


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


Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {

    // Autres routes administratives...
});

Route::get('/onthetop', [OnTheTopController::class, 'index'])->name('onthetop.dashboard');

Route::middleware(['auth', 'role:OnTheTop'])->group(function () {





});
