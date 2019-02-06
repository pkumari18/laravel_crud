<?php

Route::redirect('/', 'dashboard');
Route::resource('item', 'ItemsController');
Route::resource('category', 'CategoryController');
Route::resource('location', 'LocationController');
Route::resource('dashboard', 'DashboardController');
Route::get('/fetch/{id}', 'DashboardController@fetch');
