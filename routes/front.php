<?php

Route::ddd('pages')->group(function () {

    Route::get('/', 'HomeController@show')->name('home');

});
