<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Variante 1 - Generierung in der Factory
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => \app\Models\User::factory(1)->create()->id,
            'surname' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
        ];
    }


    /**
     * Variante 2 - Generierung im Seeder
     *
     * @return array<string, mixed>
     */
    // public function definition()
    // {
    //     return [
    //         'id' => \app\Models\User::factory(1)->create()->id,
    //         'surname' => $this->faker->firstName(),
    //         'last_name' => $this->faker->lastName(),
    //         'username' => $this->faker->userName(),
    //     ];
    // }

}
