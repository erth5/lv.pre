<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use App\Models\Example\Person;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('debug.person', compact('users'));
    }

    /**
     * Set users.names by relationship from people.surname and people.last_name
     * person -> user
     */
    public function adjust()
    {
        $persons = Person::all();
        foreach ($persons as $person) {
            if ($person->user_id != null)
                $person->user_id->name = ($person->surname . $person->last_name);
        }
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
        return view('debug.person');
    }
}
