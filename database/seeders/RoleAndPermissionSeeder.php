<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'show_permissions',
        ]);
        Permission::create([
            'name' => 'edit_permissions',
        ]);
        Permission::create([
            'name' => 'show_own_permissions',
        ]);
        Permission::create([
            'name' => 'edit_own_permissions',
        ]);

        $role = Role::create(['name' => 'user'])
            ->givePermissionTo('show_own_permissions');

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user = User::where('email', 'fdsdwp@protonmail.com')->first();
        $user->assignRole([$role->id]);
    }
}
