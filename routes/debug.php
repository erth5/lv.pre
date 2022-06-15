<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Debug\DebugController;
use App\Http\Controllers\Debug\LangController;
use App\Http\Controllers\Example\ExampleController;
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

/** Debug
 * 1a: yield, public
 * 2b: components, storage
 */
Route::controller(ImageController::class)->group(function () {
    Route::resource('image', ImageController::class);   //proof: first route can block others
    Route::post('image/debug', 'debug')->name('image.debug');
    Route::get('image/{image}/restore', 'restore')->name('image.restore');
    Route::match(array('GET', 'POST'), '/all', 'image')->name('all');
});
// unconventional, because no redirect
$debugRoutes = array('example', 'test', 'debug', 'info', 'help', 'www');
foreach ($debugRoutes as $route) {
    Route::redirect($route . '/debug', '/debug', 301);  //generates 'any'
    // Route::controller(PersonController::class)->group(function ($route) {
    //     Route::get($route . '/user', 'indexUser');
    //     Route::get($route . '/person', 'indexPerson');
    //     Route::get($route . '/person', 'indexPerson');
    // });
    Route::get($route . '/user', [PersonController::class, 'indexUser']);
    Route::get($route . '/person', [PersonController::class, 'indexPerson']);
    Route::get($route . '/name', [PersonController::class, 'getValuesDirect']);
    Route::get($route . '/{name?}', [DebugController::class, 'index'])->name('debug');
    Route::get($route . '/index', [ExampleController::class, 'index'])->name('index');
}
Route::get('hello', function () {
    echo 'hello World';
});
Route::get('/lang/home', [LangController::class, 'index']);
Route::get('/lang/lang_debug', [LangController::class, 'debug']);
Route::get('/lang/change', [LangController::class, 'change'])->name('changeLang');
    
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