<?php

Route::get('employees/dataTables', 'EmployeeController@dataTables')->name('employees.dataTables');
Route::patch('employees/{employee}/password', 'EmployeeController@updatePassword')->name('employees.update.password');
Route::resource('employees', 'EmployeeController')->except(['show', 'create', 'store', 'destroy']);

Route::get('clients/dataTables', 'ClientController@dataTables')->name('clients.dataTables');
Route::patch('clients/{client}/password', 'ClientController@updatePassword')->name('clients.update.password');
Route::resource('clients', 'ClientController');
