<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexationController extends Controller
{
    // 64Bit required
    public function index($stage=9223372036854775807){
        
    }


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
