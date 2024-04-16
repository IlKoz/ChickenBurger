<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'name' => '5261',
			'description' => 'Чизбурегер и Айтвистер',
			'old_price' => random_int(199, 499),
			'price' => random_int(199, 499),
			'image' => 'Coupon1.png',
        ];
    }
}
