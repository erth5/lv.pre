<?php

namespace App\Http\Controllers;

use App\Models\debug;
use App\Services\DebugService;
use App\Http\Requests\StoredebugRequest;
use App\Http\Requests\UpdatedebugRequest;

// Nur eine Abhängigkeit kann genutzt werden
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

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
    public function index($name = 'overview')
    {
        if ($name == 'db'){
            return view('debug.db');
        }
        if ($name == 'debug'){
            return view('debug.debug');
        }
        if ($name == 'model'){
            return view('debug.modeldebug');
        }
        if ($name == 'php'){
            return view('debug.info');
        }

        if ($name == 'template'){
            return view('debug.template');
        }
        if ($name == 'views'){
            return view('debug.views');
        }
        if ($name == 'controllers'){
            return view('debug.controllers');
        }

        return view('debug.menu');

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
