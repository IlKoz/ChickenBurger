<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tovar;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\CouponTovar;
use App\Models\User;
use App\Models\Orders;
use App\Models\Promo;
use App\Models\Restourants;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

		// neznay chto eto

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


		// Category
		$cat = ['Бургеры', 'Твистеры', 'Баскеты', 'Сочная курица', 'Картофель фри', 'Соусы', 'Холодные напитки'];
		foreach ($cat as $c)
		{
			Category::factory()->create([
				'name' => $c,
			]);
		}

		
		// Tovar
		$tovar_burger = [
            'name' => 'Чизбургер',
            'description' => 'Стрипсы из куриного филе оригинальные, Булочка Солнечная, Сыр плавленый ломтевой, Кетчуп томатный, Соус Горчичный, Лук репчатый, Огурцы маринованные',
			'category_id' => 1,
			'image' => '20231204155701Burger1.png',
        ];
		$tovar_tvister = [
            'name' => 'Айтвистер',
            'description' => 'Тортилья пшеничная со вкусом сыра, Салат Айсберг, Томаты свежие, Соус Бургер, Байтсы',
			'category_id' => 2,
			'image' => '20231208120640Tvister1.png',
        ];

		Tovar::factory(6)->create($tovar_burger);
		Tovar::factory(6)->create($tovar_tvister);


		// Coupon
		$coupon = [
			'name' => '5261',
			'description' => 'Чизбурегер и Айтвистер',
			'old_price' => random_int(199, 499),
			'price' => random_int(199, 499),
			'image' => 'Coupon1.png',
        ];
		Coupon::factory(6)->create();


		// CouponTovar
		$zxc = 1;
		while ($zxc < 6)
		{
			CouponTovar::factory()->create([
				'coupon_id' => $zxc,
				'tovar_id' => $zxc,
			]);
			$zxc++;
		};
		$zxc2 = 1;
		$qwe = 7;
		while ($zxc2 < 6)
		{
			CouponTovar::factory()->create([
				'coupon_id' => $zxc2,
				'tovar_id' => $qwe,
			]);
			$zxc2++;
			$qwe++;
		};

		// User
		$user = [
			'name' => 'Илья',
			'email' => 'qwe@qwe',
			'password' => "qweqweqwe",
			'role' => "admin",
        ];
		$user2 = [
			'name' => 'Саня',
			'email' => 'zxc@zxc',
			'password' => "zxczxczxc",
			'role' => "worker",
        ];
		User::factory(1)->create($user);
		User::factory(1)->create($user2);

		// User
		$order = [
			'user_id' => 1,
			'tovars' => json_encode([
				"1" => [
					"tovar_id" => "1",
					"tovar_name" => "Чизбургер",
					"tovar_count" => "1",
					"tovar_image" => "20231204155701Burger1.png",
					"tovar_price" => 176
				],
				"7" => [
					"tovar_id" => "7",
					"tovar_name" => "Айтвистер",
					"tovar_count" => 2,
					"tovar_image" => "20231208120640Tvister1.png",
					"tovar_price" => 310
				]
			]),
			'coupons' => json_encode([
				"1" => [
					"coupon_id" => "1",
					"coupon_name" => "5261",
					"coupon_count" => "1",
					"coupon_image" => "Coupon1.png",
					"coupon_price" => 339,
					"coupon_description" => "Чизбурегер и Айтвистер"
				]
			]),
			'price' => 999,
			'status' => "Ожидается",
		];
		$order2 = [
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
			'status' => "Готовится",
		];
		$order3 = [
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
			'status' => "Готов",
		];
		$order4 = [
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
			'status' => "Выдан",
		];
		$order5 = [
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
		

		Orders::factory(1)->create($order);
		Orders::factory(1)->create($order2);
		Orders::factory(1)->create($order3);
		Orders::factory(1)->create($order4);
		Orders::factory(1)->create($order5);


		Promo::factory(6)->create();

		$map = [
            'address' => "Комсомольский просп., 18, Красноярск",
            'phone' => "8 (960) 759-74-46",
            'working_time' => "05:00 - 01:00",
        ];
		$map2 = [
            'address' => "ул. 9 Мая, 62, Красноярск",
            'phone' => "8 (960) 759-74-46",
            'working_time' => "05:00 - 01:00",
        ];
		$map3 = [
            'address' => "ул. 9 Мая, 77, Красноярск",
            'phone' => "8 (960) 759-74-46",
            'working_time' => "05:00 - 01:00",
        ];
		$map4 = [
            'address' => "Сибирский пер., 5А, Красноярск",
            'phone' => "8 (960) 759-74-46",
            'working_time' => "05:00 - 01:00",
        ];
		Restourants::factory(1)->create($map);
		Restourants::factory(1)->create($map2);
		Restourants::factory(1)->create($map3);
		Restourants::factory(1)->create($map4);
    }
}
