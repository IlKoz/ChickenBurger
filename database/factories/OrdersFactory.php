<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'user_id' => 1,
			'tovars' => json_encode([
				"1" => [
					"tovar_id" => "1",
					"tovar_name" => "Чизбургер",
					"tovar_count" => "1",
					"tovar_image" => "20231204155701Burger1.png",
					"tovar_price" => 176
				],
			]),
			'price' => 149,
			'status' => "Отменен",
		];
    }
}
