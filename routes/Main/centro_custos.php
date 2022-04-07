<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    sleep(150);
    return 'done';
});
