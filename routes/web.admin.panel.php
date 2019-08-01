<?php

Route::get('users/datatables', 'UserController@datatables')->name('users.datatables');
Route::patch('users/{user}/password', 'UserController@updatePassword')->name('users.update.password');
Route::resource('users', 'UserController')->except(['show', 'create', 'store', 'destroy']);

Route::get('endusers/datatables', 'EnduserController@datatables')->name('endusers.datatables');
Route::patch('endusers/{enduser}/password', 'EnduserController@updatePassword')->name('endusers.update.password');
Route::resource('endusers', 'EnduserController');
