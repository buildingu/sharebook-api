<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EndUser>
 */
class EndUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'country_iso' => 'CA',
            'state_iso' => 'ON',
            'city_id' => 16152,
            'status' => fake()->boolean()
        ];
    }
}
