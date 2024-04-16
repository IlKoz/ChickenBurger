<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restourants>
 */
class RestourantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => "Комсомольский просп., 18, Красноярск",
            'phone' => "8 (960) 759-74-46",
            'working_time' => "05:00 - 01:00",
        ];
    }
}
