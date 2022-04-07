<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Config\MainUserController;
use App\Http\Controllers\Main\Config\MainConfigController;
use App\Http\Controllers\Main\Config\MainEmpresaController;
use App\Http\Controllers\Main\Config\MainUserGroupController;
use App\Http\Controllers\Main\Config\MainDepartamentoController;
use App\Http\Controllers\Main\Config\MainEventController;

Route::get('/', [MainConfigController::class, 'index']);

Route::post('utilizadores/{mainUser:slug}/resetpassword', [MainUserController::class, 'resetpassword']);
Route::post('utilizadores/{mainUser:slug}/permissao', [MainUserController::class, 'updatePermissao']);
Route::resource('utilizadores', MainUserController::class)->parameters(['utilizadores' => 'mainUser:slug']);

Route::post('grupos_utilizadores/{mainUserGroup}/permissao', [MainUserGroupController::class, 'updatePermissao']);
Route::resource('grupos_utilizadores', MainUserGroupController::class)->parameters(['grupos_utilizadores' => 'mainUserGroup']);

Route::resource('departamentos', MainDepartamentoController::class)->parameters(['departamentos' => 'mainDepartamento:slug']);

Route::resource('empresa', MainEmpresaController::class)->only(['index', 'store']);

Route::resource('eventos', MainEventController::class)->only(['index', 'show']);
