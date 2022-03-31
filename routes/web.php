<?php

//Route::get('/', 'ArticlesController@index');
//Route::resource('/articles', 'ArticlesController');

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AdminController;

Route::get('/', [ArticlesController::class, 'index']);
Route::get('/articles', [ArticlesController::class, 'index']);

Route::get('/articles/{article}', [ArticlesController::class, 'show']);

Route::get('/about', [ArticlesController::class, 'about']);

Route::get('/articles/create/page', [ArticlesController::class, 'create']);

Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);

Route::post('/articles', [ArticlesController::class, 'store']);

Route::patch('/articles/{article}', [ArticlesController::class, 'update']);

Route::delete('/articles/{article}', [ArticlesController::class, 'destroy']);

Route::get('/tags/{tag}', [TagsController::class, 'index']);

Route::get('/contacts', [ContactsController::class, 'contacts']);
Route::post('/articles/contacts', [ContactsController::class, 'store']);

Route::get('/admin/feedback', [AdminController::class, 'feedback']);


//
//
//Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
//
//Route::get('/articles/create', [ArticlesController::class, 'create'])->name('article.create');
//
//Route::get('/articles/{article:code}', [ArticlesController::class, 'show'])->name('article.show');
//
//Route::post('/articles', [ArticlesController::class, 'store'])->name('article.store');
//
//Route::get('/articles/{article:code}/edit', [ArticlesController::class, 'edit'])->name('article.edit');
//
//Route::patch('/articles/{article:code}', [ArticlesController::class, 'update'])->name('article.update');
//
//Route::delete('/articles/{article:code}', [ArticlesController::class, 'destroy'])->name('article.destroy');
//

//Route::post('/articles/{step}/steps/', 'ArticleStepsController@store');
//Route::post('/completed-steps/{steps}', 'CompletedStepsController@store');
//Route::delete('/completed-steps/{steps}', 'CompletedStepsController@destroy');
//Route::get('/', 'ArticlesController@index');
//Route::resource('/articles', 'ArticlesController');
//Route::post('/articles/{step}/steps/', 'ArticleStepsController@store');
//
//
//Route::post('/completed-steps/{steps}', 'CompletedStepsController@store');
//Route::delete('/completed-steps/{steps}', 'CompletedStepsController@destroy');




