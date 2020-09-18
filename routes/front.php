<?php

use App\Http\Controllers\Front\HomeController;

Route::get('/', [HomeController::class, 'show'])->name('home');
