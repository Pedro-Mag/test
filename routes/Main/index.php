<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\MainAuthController;
use App\Http\Controllers\Main\serveAssetsController;
use App\Http\Controllers\Main\Config\MainUserController;
use App\Http\Controllers\Main\Config\MainConfigController;
use App\Http\Controllers\Main\Config\MainEmpresaController;
use App\Http\Controllers\Main\Config\MainUserGroupController;
use App\Http\Controllers\Main\Config\MainDepartamentoController;

Route::get('login', [MainAuthController::class, 'index']);
Route::post('login', [MainAuthController::class, 'login']);

Route::middleware('auth:clientes')->group(function () {

    Route::get('logged', [MainAuthController::class, 'show']);
    Route::post('logged', [MainAuthController::class, 'edit']);
    Route::post('logout', [MainAuthController::class, 'destroy']);
    Route::get('session/menu', [MainAuthController::class, 'menu']);
    Route::get('session/user', [MainAuthController::class, 'user']);

    Route::get('/', function ($clienteDomain) {
        return inertia('Main/Home/Index', [
            'cliente' => $clienteDomain
        ]);
    })->name('clientes.home');

    Route::get('displayimage/{folder}/{file}', [serveAssetsController::class, 'image']);

    Route::prefix('centro_custos')->group(__DIR__ . '/centro_custos.php');
    Route::prefix('obras')->group(__DIR__ . '/obras.php');

    Route::prefix('config')->group(__DIR__ . '/config.php');

});
