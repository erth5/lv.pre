<?php

namespace Database\Seeders\Example;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
    }
}
