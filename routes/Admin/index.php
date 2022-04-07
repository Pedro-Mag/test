<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('login', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('login', [AdminAuthController::class, 'login']);

Route::middleware(['auth:admins'])->group(function () {

    Route::get('logged', [AdminAuthController::class, 'show']);
    Route::post('logged', [AdminAuthController::class, 'edit']);
    Route::post('logout', [AdminAuthController::class, 'destroy']);
    Route::get('session/menu', [AdminAuthController::class, 'menu']);
    Route::get('session/user', [AdminAuthController::class, 'user']);

    Route::get('/', function () {
        return inertia('Admin/Home/Index');
    });

    Route::prefix('clientes')->group(__DIR__ . '/clientes.php');
    Route::prefix('modulos')->group(__DIR__ . '/modulos.php');
    Route::prefix('eventos')->group(__DIR__ . '/messages.php');
    Route::prefix('utilizadores')->group(__DIR__ . '/utilizadores.php');

});
