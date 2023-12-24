<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\EmployeeController;
use App\Http\Controllers\Api\V1\RoleController;
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

Route::prefix('v1')->group(function () {

    Route::middleware('auth:sanctum')->group(function () {

        Route::prefix('employees')->group(function () {
            Route::post('/', [EmployeeController::class, 'create'])->name('api.v1.employees.create');
            Route::post('/{user}/permissions', [RoleController::class, 'giveRole'])
                ->middleware('permission:give permissions')
                ->name('api.v1.employees.permissions.assign');
        });
    });
});

Route::prefix('auth')->group(function () {
    Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum')->name('api.user');
    Route::post('login', [AuthController::class, 'login'])->name('api.login');
    Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
});
