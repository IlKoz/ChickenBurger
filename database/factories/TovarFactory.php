<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tovar>
 */
class TovarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => 'Чизбургер',
            'name' => 'Название',
            // 'description' => 'Стрипсы из куриного филе оригинальные, Булочка Солнечная, Сыр плавленый ломтевой, Кетчуп томатный, Соус Горчичный, Лук репчатый, Огурцы маринованные',
            'description' => '',
			// 'category_id' => 1,
			'category_id' => 1,
			'price' => random_int(59, 199),
			// 'image' => '20231204155701Burger1.png',
			'image' => '20231208120640Tvister1.png',
        ];
    }
}
