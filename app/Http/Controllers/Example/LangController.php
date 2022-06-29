<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use LaravelLang\Publisher\Facades\Helpers\Locales;

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

    /** Proof current lang status
     * @return langStatus
     */
    public function debug()
    {
        // List of available locations.
        $availaibleLocales[] = (Locales::available());

        // // List of installed locations.
        $installedLocales[] =  Locales::installed();

        // // Retrieving a list of protected locales.
        $protectedLocales = Locales::protects();

        // // Checks if a language pack is installed.
        // Locales::isAvailable(string $locale): bool

        // // The checked locale protecting.
        // Locales::isProtected(string $locale): bool

        // // Checks whether it is possible to install the language pack.
        // Locales::isInstalled(string $locale): bool

        // // Getting the default localization name.: string
        $default = Locales::getDefault();

        // // Getting the fallback localization name.: string
        $fallback = Locales::getFallback();

        // dd($protectedLocales);
        $data = [
            'availaibleLocales' => $availaibleLocales,
            'installedLocales' => $installedLocales,
            'protectedLocales' => $protectedLocales,
            'default' => $default,
            'fallback' => $fallback,
        ];
        return view('debug.lang', compact('data'));
    }
}
