<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminClienteController;

Route::get('{adminCliente:slug}/detalhes', [AdminClienteController::class, 'showDetails'])->name('adminClientes.detalhes');
Route::post('{adminCliente:slug}/editar_base_dados', [AdminClienteController::class, 'editDatabase']);
Route::post('{adminCliente:slug}/criar_base_dados', [AdminClienteController::class, 'createDatabase']);
Route::post('{adminCliente:slug}/migrar_base_dados', [AdminClienteController::class, 'migrateDatabase']);
Route::post('{adminCliente:slug}/module/{modulo}', [AdminClienteController::class, 'toggleModule']);
Route::resource('/', AdminClienteController::class)->parameters([
    '' => 'adminCliente:slug',
]);
