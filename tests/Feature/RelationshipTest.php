<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Person;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RelationshipTest extends TestCase
{
    /**
     * Test One to One Relationship Person to User
     *
     * @return void
     */
    public function test_belongs_to_User()
    {
        /**
         * Funktionsweiße mit Variante Factory anders
         * $user = User::factory()->create();
         * $person = Person::factory->create();
         * $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->people); 
         */
    }

    /**
     * Test One to One Relationship User to Person
     *
     * @return void
     */
    public function test_has_a_person()
    {
        // $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $person->users);
    }
}
