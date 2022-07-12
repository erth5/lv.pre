<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionAndRoleController extends Controller
{
    public function role(Request $request, Role $role)
    {
        dd($request);
        if ($request->roles != null)
            $role = $request->roles;
        $users = User::with('roles.permissions')->get();
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        // Doppelte Zuweisung
        $role = Role::where('name', $role)->with('permissions')->first();

        // Schreibweise muss so sein
        return view('permission.index')->with([
            'role' => $role ?? null
        ])
            ->with(compact('users'))
            ->with(compact('roles'))
            ->with(compact('permissions'));
    }

    /** Verarbeiten von Berechtigungen
     * @param userID $request->id NutzerID des gewählten Nutzers
     * @param newPerm $request->add Berechtigung zum hinzufügen
     * @param oldPerm $request->del Berechtigung zum entfernen
     * 
     * @internal user gewählter Nutzer
     * @internal permissions alle Berechtigungen
     * @internal perm Zwischenvariable zu veröndernde Berechtigung
     */
    public function user(Request $request)
    {
        // dd($request);
        if ($request->id != null) {
            $userID = $request->id;
            $user = User::where('id', $userID)->with('permissions')->first();
        }

        // Vergeben und entfernen von Berechtigungen
        if ($request->del != "null") {
            $user->removePermission($request->del);
        }

        if ($request->add != "null") {
            $perm = $request->add;
            $user->addPermission($perm);
        }

        $permissions = Permission::all();
        $users = User::with('permissions')->get();

        return view('permission.index')->with([
            'user' => $user ?? null
        ])
            ->with(compact('users'))
            ->with(compact('permissions'))
            ->with('status', 'erfoldgreich geladen');
    }
}
