<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display all users and his relationship to persons
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Leere User wird mitgeschickt
        $users = User::all();
        return view('debug.people', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return view('debug.people');
    }
}
