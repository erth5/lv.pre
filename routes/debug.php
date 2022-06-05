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

/** Debug  
 * 1a: yield, public
 * 2b: components, storage
 */
Route::resource('image', ImageController::class);
Route::get('upload', [ImageController::class, 'create']);
// Route::match(array('GET', 'POST'), '/image', [ImageController::class, 'image'])->name('image');

Route::post('/image/debug', [ImageController::class, 'debug'])->name('image.debug');

$debugRoutes = array('test', 'debug', 'info', 'help', 'www');
foreach ($debugRoutes as $route) {
    Route::redirect($route . '/debug', '/debug', 301); //generates 'any'
    Route::get($route . '/user', [PersonController::class, 'index']);
    Route::get($route . '/{name?}', [DebugController::class, 'index'])->name('debug');
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
