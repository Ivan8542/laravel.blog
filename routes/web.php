<?php
Route::get('/', 'ArticlesController@index');
Route::resource('/articles', 'ArticlesController');
Route::post('/articles/{step}/steps/', 'ArticleStepsController@store');


Route::post('/completed-steps/{steps}', 'CompletedStepsController@store');
Route::delete('/completed-steps/{steps}', 'CompletedStepsController@destroy');




