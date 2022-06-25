<?php

namespace App\Http\Controllers\Debug;

use App\Models\Debug\Debug;
use App\Models\Example\Person;
use App\Services\DebugService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\Example\PersonFactory;
use AshAllenDesign\ConfigValidator\Services\ConfigValidator;
use Illuminate\Support\Facades\Schema;

/** Freie Wahl (wenn benötigt)
 * use Illuminate\Routing\Route;
 * use Illuminate\Support\Facades\Route;
 */

class DebugController extends Controller
{
    /** Use a Service
     * @param DebugService $debugService auslagerung des Controllers
     */
    protected $debugService;
    public function __construct(DebugService $debugService)
    {
        $this->debugService = $debugService;
    }

    /**
     * control debug calls
     * @return void
     */

    /**
     * Display a listing of the resource.
     * break not needed?
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name = 'main')
    {
        $url = Config::set('constants.info.url', 'http://example.de');
        switch ($name) {
            case 'test':
                DebugController::test();
                break;
            case 'db':
                return view('debug.db');
            case 'debug':
                return view('debug.debug');
            case 'php':
                return view('debug.info');
            case 'env':
                return view('debug.env');
            case 'env2':
                $array = file("../.env", FILE_SKIP_EMPTY_LINES);
                print_r($array);
                echo ('<br>');
                break;
            case 'template':
                return view('debug.template');
            case 'views':
                return view('debug.views');
            case 'controllers':
                $path = public_path('../app/Http/Controllers');
                $files = File::allFiles($path);
                dd($files);
            case 'models':
                $path = public_path('../app/Models');
                $files = File::allFiles($path);
                dd($files);
            case 'lang':
                return view('debug.lang');
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
            case 'config':
                $configValidation = (new ConfigValidator())->run();
                return $configValidation;
                break;
            case 'session':
                $allSessions = session()->all();
                dd($allSessions);
                return view('debug.session');
            case 'sessions':
                return view('debug.sessions');
            case 'status':
                return redirect()->route('debug')->with('status', "state message");
            case 'error':
                return redirect()->route('debug')->withErrors(['msg' => 'message for errors']);
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
        Debug::truncate();
    }

    public function test()
    {
        /** dons't works */
        // $test = Person::username();
        // dd($test);

        /** works */
        // $columns = ['id', 'user_id', 'surname', 'last_name', 'username', 'created_at', 'updated_at'];
        // $coloumschecker = $this->debugService->proofAllDatabaseFields('people', $columns);
        // dd($coloumschecker);

        /** works */
        // $person = Person::first();
        // $columnName = 'surname';
        // dd($person->{$columnName});

        /** works */
        // $columns = ['surname', 'last_name', 'username'];
        // $coloumschecker = $this->debugService->proofDatabaseFields(Person::class, $columns);
        // dd($coloumschecker);
    }
}
