<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class IndexationController extends Controller
{

    public function index()
    {
        foreach (Config('database.telescope') as $db) {
            dd($db);
        }
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
    }
}
