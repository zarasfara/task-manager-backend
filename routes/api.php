<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Admin\RoleController;
use App\Http\Controllers\Api\V1\Admin\UserController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'v1',
    'as' => 'api.v1.',
    'middleware' => ['auth:sanctum'],
], function () {

    Route::group(['prefix' => 'admin'], function () {
        Route::post('user/create', [UserController::class, 'create'])->name('user.create');
    });

    Route::group([
        'prefix' => 'roles',
        'middleware' => 'permission:give permissions',
    ], function () {
        Route::post('give-role/{user}', [RoleController::class, 'giveRole'])->name('role.give');
    });
});

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum')->name('user');
});
