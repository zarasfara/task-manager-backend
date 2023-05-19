<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;

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


Route::controller(PageController::class)->group(function () {

    Route::get('/', 'home')->name('home');
    Route::get('/projects', 'projects')->name('projects');
    Route::get('/users', 'users')->name('users');
    Route::get('/dashboard', 'dashBoard')->name('dashboard');

    Route::get('/login', [PageController::class, 'login'])->name('login');

});

Route::controller(LoginController::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/login', 'login')->name('login.send');
    Route::put('/update-user', 'updateUser')->name('update-user');
});

Route::group(['middleware' => ['access:admin', 'auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminPageController::class, 'home'])->name('home');
});
