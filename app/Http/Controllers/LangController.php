<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    /**
     * Display a view to change language
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('debug.lang');
    }

    /**
     * Change the language
     *
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}
