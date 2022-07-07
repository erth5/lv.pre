<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Deleted User
        User::factory()->create([
            'name' => 'Leila Hold',
            'email' => 'hrm44745@jeoce.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => token_name(10),
            'deleted_at' => now()
        ]);

        $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'password' => 'admin123'
        ]);
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
