<?php

use App\Http\Controllers\Admin\MainEventsMessageController;
use Illuminate\Support\Facades\Route;

Route::resource('/', MainEventsMessageController::class)->parameters([
    '' => 'mainEventsMessage',
]);
