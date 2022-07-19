<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function test(){
        
        $user = User::where('name', 'Max Mustermann')->first();
        // dd($user);
        return $user->proofUserCan('show_permissions');
    }
}
