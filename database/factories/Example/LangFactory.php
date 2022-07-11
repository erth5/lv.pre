<?php

namespace Database\Factories\Example;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'language' => $this->faker->languageCode(),
            'country_code' => $this->faker->countryCode(),
            // 'abbreviation' => $this->faker->countryISOAlpha3(),
        ];
    }
}
