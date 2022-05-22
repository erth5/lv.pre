<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\debugController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* 1a: yield, public */
Route::get('upload', [ImageController::class, 'upload']);
Route::post('upload', [ImageController::class, 'store'])->name('upload');
// Syntax 1, no array anomaly
Route::resource('show', ImageController::class);
// Route::get('show', [ImageController::class, 'index'])->name('index');

// TODO ? correct post method for that
Route::delete('remove/{id?}', [ImageController::class, 'show']);

/* 2b: components, storage */
Route::get('image', [ImageController::class, 'image']);

/* Debug  */
$debugRoutes = array('test', 'debug', 'info', 'help', 'www');
foreach ($debugRoutes as $route) {
    Route::redirect($route . '/debug', '/debug', 301);
    Route::get($route . '/user', [PersonController::class, 'index']);
    Route::get($route . '/{name?}', [DebugController::class, 'index'])->name('debug');
}
Route::get('hello', function () {
    echo 'hello World';
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
