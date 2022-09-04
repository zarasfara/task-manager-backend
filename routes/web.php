<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use \App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [PageController::class,'home'])->name('home');

Route::prefix('login')->group(function () {
    Route::get('/', [PageController::class,'login'])->name('login');
    Route::post('/', [LoginController::class,'login'])->name('login');
});
