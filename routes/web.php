<?php

use Illuminate\Support\Facades\Route;

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

Route::domain('admin.' . env('APP_DOMAIN', 'sigo.com.pt'))->group(__DIR__ . '/Admin/index.php');
Route::domain('{clienteDomain}.' . env('APP_DOMAIN', 'sigo.com.pt'))->group(__DIR__ . '/Main/index.php');


Route::get('/', function () {
    return inertia('Root/Index');
});
