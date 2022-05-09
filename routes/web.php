<?php

use App\Http\Controllers\debugController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/marquee', function(){
    echo  Storage::disk('local')->get('router/web.php');
});

Route::get('/hier', [TestController::class, 'index']);

// Image Upload Example TODO: combine to all classes
Route::get('/images', [ImageController::class, 'index']);
Route::post('/image-upload', [ImageController::class, 'store'])->name('image.store');

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
