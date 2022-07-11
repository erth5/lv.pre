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
        // dd($request->roles);
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

    public function user(Request $request, User $user)
    {
        // dd($request);
        if ($request->email != null) {
            $user = $request->email;
        }

        $users = User::with('permissions')->get();
        $permissions = Permission::all();
        // Doppelte Zuweisung
        $user = User::where('email', $user)->with('permissions')->first();

        // dd($user);
        // Schreibweise muss so sein
        return view('permission.index')->with([
            'user' => $user ?? null
        ])
            ->with(compact('users'))
            ->with(compact('permissions'));
    }
}
