<?php

Route::get('/', 'ArticlesController@index');
Route::get('/about', 'ArticlesController@about');
Route::get('/contacts', 'ContactsController@contacts');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show');

Route::get('/admin/feedback', 'AdminController@feedback');

Route::post('/', 'ArticlesController@store');
Route::post('/', 'ContactsController@store');

