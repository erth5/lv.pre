<?php

namespace App\Http\Controllers\Debug;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Indexation extends Controller
{
    public function stageTwo()
    {
        /** 1 stages */
        // ohne Get
        // $user = User::find($id);

        /** 2 stages */
        // mit get
        // $person = person::with('partner.image!!!')->get();

        /** 3 stages */
        // user->person->image->show
        // image->person->user->name
    }
}
