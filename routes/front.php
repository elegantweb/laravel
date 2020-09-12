<?php

use App\Front\Pages\Controllers\HomeController;

Route::get('/', [HomeController::class, 'show'])->name('home');
