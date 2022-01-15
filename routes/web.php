<?php

//Route::get('/', 'ArticlesController@index');
//Route::get('/about', 'ArticlesController@about');
//Route::get('/contacts', 'ContactsController@contacts');
//Route::get('/articles/create', 'ArticlesController@create');
//Route::get('/articles/{article}', 'ArticlesController@show');
//
//Route::get('/admin/feedback', 'AdminController@feedback');
//
//Route::post('/', 'ArticlesController@store');
//Route::post('/', 'ContactsController@store');
//
//
////
Route::resource('/articles', 'ArticlesController');
//
//Route::get('/tasks{task}/edit', 'ArticlesController@edit');
//Route::patch('/tasks/{task}', 'ArticlesController@update');
//Route::delete('/tasks/{task}', 'ArticlesController@destroy');




