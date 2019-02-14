<?php

Route::get('users/datatables', 'Panel\UserController@datatables')->name('users.datatables');
Route::patch('users/{user}/password', 'Panel\UserController@updatePassword')->name('users.update.password');
Route::resource('users', 'Panel\UserController')->except(['show', 'create', 'store', 'destroy']);

Route::get('endusers/datatables', 'Panel\EnduserController@datatables')->name('endusers.datatables');
Route::put('endusers/{customer}/password', 'Panel\EnduserController@updatePassword')->name('endusers.update.password');
Route::resource('endusers', 'Panel\EnduserController');
