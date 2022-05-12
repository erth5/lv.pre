<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\debugController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TestController;

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

// Image Upload Example TODO: ->get()->groupBy(function - alles sichtbar 
Route::get('image', [ImageController::class, 'index']);

Route::post('image', [ImageController::class, 'store'])->name('image.store');

// Debug, Info, Test
Route::redirect('debug/debug', '/debug', 301);

$debugRoutes = array('test', 'debug', 'info', 'help', 'www');
foreach ($debugRoutes as $route) {
    Route::get($route . '/user', [PersonController::class, 'index'])->name('info.user');
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
