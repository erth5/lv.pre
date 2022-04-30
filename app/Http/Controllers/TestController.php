<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Services\testService;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;

// Nur eine Abhängigkeit kann genutzt werden
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

class TestController extends Controller
{

    // /**
    //  * Use a Service
    //  */
    // public function __construct(TestService $testService)
    // {
    //     $this->testService = $testService;
    // }

    /**
     * control test calls
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
            return view('test.dbTest');
        }
        if ($name == 'test'){
            return view('test.test');
        }
        if ($name == 'model'){
            return view('test.modelTest');
        }
        if ($name == 'php'){
            return view('test.info');
        }

        if ($name == 'template'){
            return view('test.template');
        }
        if ($name == 'views'){
            return view('test.views');
        }
        if ($name == 'controllers'){
            return view('test.controllers');
        }

        return view('test.menu');

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
     * @param  \App\Http\Requests\StoreTestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestRequest  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
