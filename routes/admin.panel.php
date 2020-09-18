<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EmployeeController;

Route::get('employees/dataTables', [EmployeeController::class, 'dataTables'])->name('employees.dataTables');
Route::patch('employees/{employee}/password', [EmployeeController::class, 'updatePassword'])->name('employees.update.password');
Route::resource('employees', EmployeeController::class)->except(['show', 'create', 'store', 'destroy']);

Route::get('clients/dataTables', [ClientController::class, 'dataTables'])->name('clients.dataTables');
Route::patch('clients/{client}/password', [ClientController::class, 'updatePassword'])->name('clients.update.password');
Route::resource('clients', ClientController::class)->except(['show']);
