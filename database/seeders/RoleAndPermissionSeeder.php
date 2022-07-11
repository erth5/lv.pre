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
            'name' => 'show permissions',
        ]);
        Permission::create([
            'name' => 'edit permissions',
        ]);
        Permission::create([
            'name' => 'show own permissions',
        ]);
        Permission::create([
            'name' => 'edit own permissions',
        ]);

        $role = Role::create(['name' => 'user'])
            ->givePermissionTo('show own permissions');

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user = User::where('email', 'fdsdwp@protonmail.com')->first();
        $user->assignRole([$role->id]);
    }
}
