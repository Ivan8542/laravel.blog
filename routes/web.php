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
//Route::view('/', 'welcome');

Route::get('/', 'ArticlesController@index');
Route::resource('/articles', 'ArticlesController');
Route::post('/articles/{step}/steps/', 'ArticleStepsController@store');

//Route::patch('/steps/{step}', 'ArticleStepsController@update');

Route::post('/completed-steps/{steps}', 'CompletedStepsController@store');
Route::delete('/completed-steps/{steps}', 'CompletedStepsController@destroy');

//
//Route::get('/tasks{task}/edit', 'ArticlesController@edit');
//Route::patch('/tasks/{task}', 'ArticlesController@update');
//Route::delete('/tasks/{task}', 'ArticlesController@destroy');




