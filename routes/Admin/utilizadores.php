<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminUserController;

Route::post('/{utilizador:slug}/resetPassword', [AdminUserController::class, 'resetPassword']);
Route::get('/{utilizador:slug}/displayImage', [AdminUserController::class, 'displayImage']);
Route::resource('/', AdminUserController::class)->parameters([
    '' => 'utilizador:slug',
]);
