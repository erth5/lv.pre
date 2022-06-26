<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Debug\DebugController;
use App\Http\Controllers\Debug\LangController;
use App\Http\Controllers\Example\ImageController;
use App\Http\Controllers\Example\PersonController;

/*
|--------------------------------------------------------------------------
| Web Routes Debug
|--------------------------------------------------------------------------
|
| This routes file registered some routes, which help you analyse 
| your Laravel Environement. By disabling DEBUG Mode in env file,
| this routes will be deactivated
|
*/

Route::get('hello', function () {
    echo 'hello World';
});

/** Debug
 * 1a: yield, public
 * 2b: components, storage
 */
// unconventional, because no redirect
$debugRoutes = array('example', 'test', 'debug', 'info', 'help', 'www');
foreach ($debugRoutes as $route) {
    Route::redirect($route . '/debug', '/debug', 301);  //generates 'any'
    Route::get($route . '/{name?}', [DebugController::class, 'index'])->name('debug');
}

Route::controller(PersonController::class)->group(function () {
    Route::get('/person/user', 'indexUser');
    Route::get('/person/person', 'indexPerson');
    Route::get('/person/destroy', 'destroy');
    Route::get('/person/name', 'getValuesDirect');
    Route::get('/person/test', 'test');
});
Route::controller(ImageController::class)->group(function () {
    /* possible issues:
    routes at top overrides Routes at buttom in this file
    ressource has exact predefined routes
    */

    // variant1
    Route::resource('image', ImageController::class);

    // variant2
    // Route::post('/img/debug', 'debug');
    // Route::get('/img/{image}/restore', 'restore')->name('image.restore');
    // Route::match(array('GET', 'POST'), '/img', 'img');
});
Route::controller(LangController::class)->group(function () {
    Route::get('/lang/home', 'index');
    Route::get('/lang/lang_debug', 'debug');
    Route::get('/lang/change', 'change')->name('changeLang');
});
    
// Route::get('{alias}', 'HomeController@someAction')
//     ->where('alias', 'alias1|alias1.html|alias1.php|alias4');
// public function someAction($alias)
// {
//     ...
// }

// Route::match(array('GET', 'POST'), '/', function()
// {
//     return 'Hello World';
// });

// Route::controller(ItemController::class)->group(function () {
//     Route::get('items', 'index')->name('items.index');
//     Route::post('items', 'store')->name('items.store');
//     Route::get('items/create', 'create')->name('items.create');
//     Route::get('items/{item}', 'show')->name('items.show');
//     Route::put('items/{item}', 'update')->name('items.update');
//     Route::delete('items/{item}', 'destroy')->name('items.destroy');
//     Route::get('items/{item}/edit', 'edit')->name('items.edit');
// });
// Route::resource('items', ItemController::class);