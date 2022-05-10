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
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name = 'menu')
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
                return view('debug.menu');
        }
        // abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredebugRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDebugRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\debug  $debug
     * @return \Illuminate\Http\Response
     */
    public function show(debug $debug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\debug  $debug
     * @return \Illuminate\Http\Response
     */
    public function edit(debug $debug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedebugRequest  $request
     * @param  \App\Models\debug  $debug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDebugRequest $request, debug $debug)
    {
        //
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
