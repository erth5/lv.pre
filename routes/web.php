<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('see', [PersonController::class, 'index']);

// Debug, Info, Test
// Route::redirect()->route('test.test', 'test');
Route::redirect('test/test', 'test', 301);

$testRoutes = array('test', 'debug', 'info');
foreach ($testRoutes as $route){
    Route::get($route.'/{name?}', [TestController::class, 'index'])->name('test');
}Route::get('hello', function(){echo 'hello World';});

// Route::get('{alias}', 'HomeController@someAction')
//     ->where('alias', 'alias1|alias1.html|alias1.php|alias4');

// public function someAction($alias)
// {
//     ...
// }