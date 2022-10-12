<?php
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ArticleStepsController;
use App\Http\Controllers\CompletedStepsController;
use App\Http\Controllers\TagsController;
app()->singleton(App\Service\Pushall::class, function () {
    return new App\Service\Pushall('private-key') ;
});

app()->bind(App\PriceFormatter::class, function () {
    return new App\OtherPriceFormatter();
});

Route::get('/test2', function(App\PriceFormatter $formatter, App\SimplePriceFormatter $simplePriceFormatter) {
    dd($formatter->format(10000), $simplePriceFormatter->format(10000));
});

//dd(app('pushall'));
Route::get('/test', function(\App\Service\Pushall $pushall) {
    dd($pushall);
});

Route::get('/test', [TestController::class, 'index']);

Route::get('/', [ArticlesController::class, 'index']);
Route::get('/articles', [ArticlesController::class, 'index']);

Route::get('/articles/{article}', [ArticlesController::class, 'show']);

Route::get('/about', [ArticlesController::class, 'about']);

Route::get('/articles/create/page', [ArticlesController::class, 'create']);

Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);

Route::post('/articles', [ArticlesController::class, 'store']);

Route::patch('/articles/{article}', [ArticlesController::class, 'update']);

Route::delete('/articles/{article}', [ArticlesController::class, 'destroy']);

Route::get('/articles/tags/{tag}', [TagsController::class, 'index']);

Route::get('/contacts', [ContactsController::class, 'contacts']);
Route::post('/articles/contacts', [ContactsController::class, 'store']);

Route::post('/articles/{article}/steps', [ArticleStepsController::class ,'store']);
Route::patch('/steps/{step}', [ArticleStepsController::class ,'update']);

//Route::post('/completed-steps/{steps}', [CompletedStepsController::class, 'store']);
//Route::delete('/completed-steps/{steps}', [CompletedStepsController::class, 'destroy']);

Route::get('/admin/feedback', [AdminController::class, 'feedback']);


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
