<?php

namespace App\Http\Controllers\Example;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Example\Person;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Modules\GlobalUtilsModule;

class PersonController extends Controller
{
    /**
     * Display all users and his persons
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        // performance: 2 queries->bad
        if (User::first() == null)
            $users = null;
        else {
            $users = User::all();
            return view('debug.person', compact('users'));
        }
    }

    /**
     * Display all persons and his relations to users
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPerson()
    {
        // performance: 2 queries->bad
        if (Person::count() == 0)
            return view('debug.user');
        else
            $persons = Person::all();
        return view('debug.user', compact('persons'));
    }

    /** 
     * Speichert eine vorhandene oder neue Person ab
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Person $person, Request $request)
    {
        $person = Person::findOrFail($person);
        // TODO kann ncht gehen
        $person = new GlobalUtilsModule;
        $TableColumnNames = Config::get('identifier.database.people');
        $checkboxTableColumnNames = Config::get('identifier.databasepeople.checkbox');
        dd($TableColumnNames);
        $person->fillObjectFromRequest($person, $TableColumnNames, $checkboxTableColumnNames, $request);
        $person->saveOrFail();
        dd($person);
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
        $persons = Person::all();
        return redirect()->back(compact('persons'));;
    }

    public function getValuesDirect()
    {
        // $names =  User::get(array('name'));
        $names =  User::select('name')->get();
        dd($names);
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

// fügt jeden Attribut alle Values hinzu
// $tmpPartnerData = array_fill_keys($tmpPartnerKeys, $tmpPartnerValues);