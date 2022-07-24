<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Example\Person;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

$data[] = null;

class IndexationController extends Controller
{

    public function index()
    {
        foreach (Config('database.telescope') as $dbNames) {
            $data[] = Schema::getColumnListing($dbNames);
        }
        foreach (Config('database.tables') as $dbNames) {
            $data[] = Person::all();
        }
        return view('debug.indexation', compact('data'));
    }


    /** 1 stages */
    // $user = User::find($id);
    /** 2 stages */
    // $person = person::with('partner.image!!!')->firstOrFail();
    /** 3 stages */
    // user->person->image->paths

    // 64Bit required
    public function indexiation($stage = 9223372036854775807)
    {
        return view('debug.indexation');
    }
}
