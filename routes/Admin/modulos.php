<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ModuleController;

Route::get('{modulo}/get/{variable}', [ModuleController::class, 'getVariable']);
Route::post('{modulo}/reorder', [ModuleController::class, 'reorder']);
Route::resource('/', ModuleController::class)->parameters([
    '' => 'modulo',
]);
