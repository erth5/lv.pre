<?php

namespace App\Http\Controllers;

use App\Models\debug;
use App\Services\DebugService;
use App\Http\Requests\StoredebugRequest;
use App\Http\Requests\UpdatedebugRequest;

// Nur eine Abhängigkeit kann genutzt werden
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class DebugController extends Controller
{

    // /**
    //  * Use a Service
    //  */
    // public function __construct(debugService $debugService)
    // {
    //     $this->debugService = $debugService;
    // }

    /**
     * control debug calls
     * @return void
     */

    /**
     * Display a listing of the resource.
     * break not needed
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name = 'main')
    {
        switch ($name) {
            case 'db':
                return view('debug.db');
                break;
            case 'debug':
                return view('debug.debug');
                break;
            case 'php':
                return view('debug.info');
                break;
            case 'env':
                return view('debug.env');
                break;
            case 'env2':
                $array = file("../.env", FILE_SKIP_EMPTY_LINES);
                print_r($array);
                echo ('<br>');
                break;
            case 'template':
                return view('debug.template');
                break;
            case 'views':
                return view('debug.views');
                break;
            case 'controllers':
                return view('debug.controllers');
                break;
            case 'lang':
                return view('debug.lang');
                break;
            case 'path':
                // Path to the project's root folder
                echo base_path() . "<br>";
                // Path to the 'app' folder
                echo app_path() . "<br>";
                // Path to the 'public' folder
                echo public_path() . "<br>";
                // Path to the 'storage' folder
                echo storage_path() . "<br>";
                // Path to the 'storage/app' folder
                echo storage_path('app') . "<br>";;
                break;
            default:
                return view('debug.layout');
        }
        // abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\debug  $debug
     * @return \Illuminate\Http\Response
     */
    public function destroy(debug $debug)
    {
        //
    }
}
