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
		//category_1
		// $tovar_burger = [
        //     'name' => 'Чизбургер',
        //     'description' => 'Стрипсы из куриного филе оригинальные, Булочка Солнечная, Сыр плавленый ломтевой, Кетчуп томатный, Соус Горчичный, Лук репчатый, Огурцы маринованные',
		// 	'category_id' => 1,
		// 	'image' => '20231204155701Burger1.png',
        // ];
		//category_2
		// $tovar_tvister = [
        //     'name' => 'Айтвистер',
        //     'description' => 'Тортилья пшеничная со вкусом сыра, Салат Айсберг, Томаты свежие, Соус Бургер, Байтсы',
		// 	'category_id' => 2,
		// 	'image' => '20231208120640Tvister1.png',
        // ];




		// Tovar
		//category_1
		$tovar_burger1 = [
            'name' => 'Чикенбургер',
            'description' => 'Котлета куриная оригинальная, Соус майонезный, Салат айсберг, Булочка Солнечная',
			'price' => '64',
			'category_id' => 1,
			'image' => 'Burger1.png',
        ];
		$tovar_burger2 = [
            'name' => 'Чизбургер',
            'description' => 'Стрипсы из куриного филе оригинальные, Булочка Солнечная, Сыр плавленый ломтевой, Кетчуп томатный, Соус Горчичный, Лук репчатый, Огурцы маринованные',
			'price' => '99',
			'category_id' => 1,
			'image' => 'Burger2.png',
        ];
		$tovar_burger3 = [
            'name' => 'Чизбургер Де Люкс',
            'description' => 'Булочка Солнечная, Филе Куриное оригинальное, Томаты свежие, Сыр плавленый ломтевой, Салат Айсберг, Кетчуп томатный, Соус Горчичный, Огурцы маринованные, Лук репчатый',
			'price' => '119',
			'category_id' => 1,
			'image' => 'Burger3.png',
        ];
		$tovar_burger4 = [
            'name' => 'Шефбургер Джуниор',
            'description' => 'Булочка с кунжутом, Стрипсы OR, Соус Цезарь, Томаты свежие, Салат айсберг',
			'price' => '139',
			'category_id' => 1,
			'image' => 'Burger4.png',
        ];
		$tovar_burger5 = [
            'name' => 'Шефбургер',
            'description' => 'Булочка с кунжутом, Филе Куриное оригинальное, Соус Цезарь, Томаты свежие, Салат Айсберг',
			'price' => '209',
			'category_id' => 1,
			'image' => 'Burger5.png',
        ];
		$tovar_burger6 = [
            'name' => 'Шефбургер Де Люкс',
            'description' => 'Булочка с кунжутом, Филе куриное оригинальное, Соус Цезарь, Томаты свежие, Сыр плавленый ломтевой, Салат Айсберг, Бекон варено-копченый',
			'price' => '219',
			'category_id' => 1,
			'image' => 'Burger6.png',
        ];

		//category_2
		$tovar_tvister1 = [
            'name' => 'Твистер',
            'description' => 'Тортилья пшеничная со вкусом сыра, Салат Айсберг, Томаты свежие, Соус Бургер, Байтсы',
			'price' => '69',
			'category_id' => 2,
			'image' => 'Twister1.png',
        ];
		$tovar_tvister2 = [
            'name' => 'Мега Твистер',
            'description' => 'Огурцы маринованные, Кетчуп томатный, Картофель фри, Тортилья пшеничная, Коул слоу (капуста, морковь), Соус Майонезный, Томаты свежие, Стрипсы OR',
			'price' => '369',
			'category_id' => 2,
			'image' => 'Twister2.png',
        ];
		$tovar_tvister3 = [
            'name' => 'Чикенмастер',
            'description' => 'Тортилья пшеничная, Филе куриное оригинальное, Томаты свежие, Салат Айсберг, Сыр плавленый ломтевой, Картофель по-деревенски, Соус майонезный',
			'price' => '299',
			'category_id' => 2,
			'image' => 'Twister3.png',
        ];
		$tovar_tvister4 = [
            'name' => 'Чиз Чикенмастер',
            'description' => 'Сырная котлета, Салат Айсберг, Тортилья пшеничная, Томаты свежие, Соус Сырный, Филе Куриное оригинальное',
			'price' => '479',
			'category_id' => 2,
			'image' => 'Twister4.png',
        ];

		//category_3
		$tovar_bascket1 = [
            'name' => 'Баскет с ножками',
            'description' => 'Голень OR, Мука пшеничная хлебопекарная в/с, Масло растительное, Соль поваренная пищевая, Ароматизатор пищевой "Панировка для курицы", Молочно-яичная смесь',
			'price' => '329',
			'category_id' => 3,
			'image' => 'bascket1.png',
        ];
		$tovar_bascket2 = [
            'name' => 'Баскет с стрипсами',
            'description' => 'Байтсы, Мука пшеничная хлебопекарная в/с, Масло растительное, Пищевая добавка "острая и пряная панировка"',
			'price' => '359',
			'category_id' => 3,
			'image' => 'bascket2.png',
        ];

		//category_4
		$tovar_chicken1 = [
            'name' => 'Ножки',
            'description' => 'Голень OR, Мука пшеничная хлебопекарная в/с, Масло растительное, Соль поваренная пищевая, Ароматизатор пищевой "Панировка для курицы", Молочно-яичная смесь',
			'price' => '249',
			'category_id' => 4,
			'image' => 'chicken1.png',
        ];
		$tovar_chicken2 = [
            'name' => 'Наггетсы',
            'description' => 'Наггетсы оригинальные, Масло растительное',
			'price' => '289',
			'category_id' => 4,
			'image' => 'chicken2.png',
        ];
		$tovar_chicken3 = [
            'name' => 'Стрипсы',
            'description' => 'Стрипсы OR, Мука пшеничная хлебопекарная в/с, Масло растительное, Соль поваренная пищевая, Ароматизатор пищевой "Панировка для курицы", Молочно-яичная смесь',
			'price' => '379',
			'category_id' => 4,
			'image' => 'chicken3.png',
        ];

		//category_5
		$tovar_fri1 = [
            'name' => 'Картофель Фри Малый',
            'description' => 'Картофель фри (Картофель фри, масло растительное), Соль поваренная пищевая',
			'price' => '89',
			'category_id' => 5,
			'image' => 'fri1.png',
        ];
		$tovar_fri2 = [
            'name' => 'Картофель Фри Стандартный',
            'description' => 'Картофель фри (Картофель фри, масло растительное), Соль поваренная пищевая',
			'price' => '119',
			'category_id' => 5,
			'image' => 'fri2.png',
        ];
		$tovar_fri3 = [
            'name' => 'Картофель Фри Баскет',
            'description' => 'Картофель фри (Картофель фри, масло растительное), Соль поваренная пищевая',
			'price' => '219',
			'category_id' => 5,
			'image' => 'fri3.png',
        ];

		//category_6
		$tovar_sauce1 = [
            'name' => 'Соус Сырный',
			'price' => '59',
			'category_id' => 6,
			'image' => 'souce1.png',
        ];
		$tovar_sauce2 = [
            'name' => 'Соус Кисло-Сладкий Чили',
			'price' => '59',
			'category_id' => 6,
			'image' => 'souce2.png',
        ];
		$tovar_sauce3 = [
            'name' => 'Соус Барбекю',
			'price' => '59',
			'category_id' => 6,
			'image' => 'souce3.png',
        ];
		$tovar_sauce4 = [
            'name' => 'Соус Чесночный',
			'price' => '59',
			'category_id' => 6,
			'image' => 'souce4.png',
        ];
		$tovar_sauce5 = [
            'name' => 'Соус Терияки',
			'price' => '59',
			'category_id' => 6,
			'image' => 'souce5.png',
        ];
		$tovar_sauce6 = [
            'name' => 'Соус Кетчуп Томатный',
			'price' => '59',
			'category_id' => 6,
			'image' => 'souce6.png',
        ];

		//category_7
		$tovar_drink1 = [
            'name' => 'Эвервесс Кола в бутылке 0,5 л',
			'price' => '149',
			'category_id' => 7,
			'image' => 'drink1.png',
        ];
		$tovar_drink2 = [
            'name' => 'Чай Lipton Лимон в бутылке 0,5 л',
			'price' => '169',
			'category_id' => 7,
			'image' => 'drink2.png',
        ];
		$tovar_drink3 = [
            'name' => 'Чай Lipton Зеленый в бутылке 0,5 л',
			'price' => '169',
			'category_id' => 7,
			'image' => 'drink3.png',
        ];
		$tovar_drink4 = [
            'name' => 'Аква Минерале без газа 0,5л',
			'price' => '149',
			'category_id' => 7,
			'image' => 'drink4.png',
        ];
		
		





		Tovar::factory(1)->create($tovar_burger1);
		Tovar::factory(1)->create($tovar_burger2);
		Tovar::factory(1)->create($tovar_burger3);
		Tovar::factory(1)->create($tovar_burger4);
		Tovar::factory(1)->create($tovar_burger5);
		Tovar::factory(1)->create($tovar_burger6);

		Tovar::factory(1)->create($tovar_tvister1);
		Tovar::factory(1)->create($tovar_tvister2);
		Tovar::factory(1)->create($tovar_tvister3);
		Tovar::factory(1)->create($tovar_tvister4);

		Tovar::factory(1)->create($tovar_bascket1);
		Tovar::factory(1)->create($tovar_bascket2);

		Tovar::factory(1)->create($tovar_chicken1);
		Tovar::factory(1)->create($tovar_chicken2);
		Tovar::factory(1)->create($tovar_chicken3);

		Tovar::factory(1)->create($tovar_fri1);
		Tovar::factory(1)->create($tovar_fri2);
		Tovar::factory(1)->create($tovar_fri3);

		Tovar::factory(1)->create($tovar_sauce1);
		Tovar::factory(1)->create($tovar_sauce2);
		Tovar::factory(1)->create($tovar_sauce3);
		Tovar::factory(1)->create($tovar_sauce4);
		Tovar::factory(1)->create($tovar_sauce5);
		Tovar::factory(1)->create($tovar_sauce6);

		Tovar::factory(1)->create($tovar_drink1);
		Tovar::factory(1)->create($tovar_drink2);
		Tovar::factory(1)->create($tovar_drink3);
		Tovar::factory(1)->create($tovar_drink4);


		// Coupon
		// $coupon = [
		// 	'name' => '5261',
		// 	'description' => 'Чизбурегер и Айтвистер',
		// 	'old_price' => random_int(199, 499),
		// 	'price' => random_int(199, 499),
		// 	'image' => 'Coupon1.png',
        // ];
		// Coupon::factory(6)->create();

		$coupon1 = [
			'name' => '6535',
			'description' => 'Твистер + Картофель Фри Стандартный',
			'old_price' => 298,
			'price' => 259,
			'image' => 'coupon1.png',
        ];
		$coupon2 = [
			'name' => '5782',
			'description' => 'Шефбургер + Картофель Фри Стандартный + Соус Сырный',
			'old_price' => 347,
			'price' => 299,
			'image' => 'coupon2.png',
        ];
		$coupon3 = [
			'name' => '6885',
			'description' => 'Шефбургер Джуниор + Наггетсы + Соус Кетчуп Томатный',
			'old_price' => 467,
			'price' => 419,
			'image' => 'coupon3.png',
        ];
		$coupon4 = [
			'name' => '5567',
			'description' => 'Чикенмастер + Наггетсы + Соус Кетчуп Томатный + Соус Сырный',
			'old_price' => 476,
			'price' => 429,
			'image' => 'coupon4.png',
        ];
		
		Coupon::factory(1)->create($coupon1);
		Coupon::factory(1)->create($coupon2);
		Coupon::factory(1)->create($coupon3);
		Coupon::factory(1)->create($coupon4);



		// CouponTovar
		// $zxc = 1;
		// while ($zxc < 6)
		// {
		// 	CouponTovar::factory()->create([
		// 		'coupon_id' => $zxc,
		// 		'tovar_id' => $zxc,
		// 	]);
		// 	$zxc++;
		// };
		// $zxc2 = 1;
		// $qwe = 7;
		// while ($zxc2 < 4)
		// {
		// 	CouponTovar::factory()->create([
		// 		'coupon_id' => $zxc2,
		// 		'tovar_id' => $qwe,
		// 	]);
		// 	$zxc2++;
		// 	$qwe++;
		// };


		CouponTovar::factory()->create([
			'coupon_id' => 1,
			'tovar_id' => 7,
		]);
		CouponTovar::factory()->create([
			'coupon_id' => 1,
			'tovar_id' => 17,
		]);

		CouponTovar::factory()->create([
			'coupon_id' => 2,
			'tovar_id' => 5,
		]);
		CouponTovar::factory()->create([
			'coupon_id' => 2,
			'tovar_id' => 17,
		]);
		CouponTovar::factory()->create([
			'coupon_id' => 2,
			'tovar_id' => 19,
		]);

		CouponTovar::factory()->create([
			'coupon_id' => 3,
			'tovar_id' => 4,
		]);
		CouponTovar::factory()->create([
			'coupon_id' => 3,
			'tovar_id' => 14,
		]);
		CouponTovar::factory()->create([
			'coupon_id' => 3,
			'tovar_id' => 24,
		]);

		CouponTovar::factory()->create([
			'coupon_id' => 4,
			'tovar_id' => 9,
		]);
		CouponTovar::factory()->create([
			'coupon_id' => 4,
			'tovar_id' => 14,
		]);
		CouponTovar::factory()->create([
			'coupon_id' => 4,
			'tovar_id' => 19,
		]);
		CouponTovar::factory()->create([
			'coupon_id' => 4,
			'tovar_id' => 24,
		]);

		// Рестораны
		$map = [
            'address' => "Красноярск, Комсомольский просп., 18",
        ];
		$map2 = [
            'address' => "Красноярск, ул. 9 Мая, 62",
        ];
		$map3 = [
            'address' => "Красноярск, ул. 9 Мая, 77",
        ];
		$map4 = [
            'address' => "Красноярск, Сибирский пер., 5А",
        ];
		Restourants::factory(1)->create($map);
		Restourants::factory(1)->create($map2);
		Restourants::factory(1)->create($map3);
		Restourants::factory(1)->create($map4);

		// User
		$user = [
			'name' => 'Илья',
			'email' => 'zxc@zxc',
			'password' => "zxczxczxc",
			'role' => "admin",
        ];
		$user2 = [
			'name' => 'Александр',
			'email' => 'qwe@qwe',
			'password' => "qweqweqwe",
			'role' => "worker",
        ];
		User::factory(1)->create($user);
		User::factory(1)->create($user2);

		// User
		// $order = [
		// 	'user_id' => 1,
		// 	'tovars' => json_encode([
		// 		"1" => [
		// 			"tovar_id" => "1",
		// 			"tovar_name" => "Чизбургер",
		// 			"tovar_count" => "1",
		// 			"tovar_image" => "20231204155701Burger1.png",
		// 			"tovar_price" => 176
		// 		],
		// 		"7" => [
		// 			"tovar_id" => "7",
		// 			"tovar_name" => "Айтвистер",
		// 			"tovar_count" => 2,
		// 			"tovar_image" => "20231208120640Tvister1.png",
		// 			"tovar_price" => 310
		// 		]
		// 	]),
		// 	'coupons' => json_encode([
		// 		"1" => [
		// 			"coupon_id" => "1",
		// 			"coupon_name" => "5261",
		// 			"coupon_count" => "1",
		// 			"coupon_image" => "Coupon1.png",
		// 			"coupon_price" => 339,
		// 			"coupon_description" => "Чизбурегер и Айтвистер"
		// 		]
		// 	]),
		// 	'price' => 999,
		// 	'status' => "Ожидается",
		// 	'restourant' => 1,
		// ];
		// $order2 = [
		// 	'user_id' => 1,
		// 	'tovars' => json_encode([
		// 		"1" => [
		// 			"tovar_id" => "1",
		// 			"tovar_name" => "Чизбургер",
		// 			"tovar_count" => "1",
		// 			"tovar_image" => "20231204155701Burger1.png",
		// 			"tovar_price" => 176
		// 		],
		// 	]),
		// 	'price' => 149,
		// 	'status' => "Готовится",
		// 	'restourant' => 1,
		// ];
		// $order3 = [
		// 	'user_id' => 1,
		// 	'tovars' => json_encode([
		// 		"1" => [
		// 			"tovar_id" => "1",
		// 			"tovar_name" => "Чизбургер",
		// 			"tovar_count" => "1",
		// 			"tovar_image" => "20231204155701Burger1.png",
		// 			"tovar_price" => 176
		// 		],
		// 	]),
		// 	'price' => 149,
		// 	'status' => "Готов",
		// 	'restourant' => 1,
		// ];
		// $order4 = [
		// 	'user_id' => 1,
		// 	'tovars' => json_encode([
		// 		"1" => [
		// 			"tovar_id" => "1",
		// 			"tovar_name" => "Чизбургер",
		// 			"tovar_count" => "1",
		// 			"tovar_image" => "20231204155701Burger1.png",
		// 			"tovar_price" => 176
		// 		],
		// 	]),
		// 	'price' => 149,
		// 	'status' => "Выдан",
		// 	'restourant' => 1,
		// ];
		// $order5 = [
		// 	'user_id' => 1,
		// 	'tovars' => json_encode([
		// 		"1" => [
		// 			"tovar_id" => "1",
		// 			"tovar_name" => "Чизбургер",
		// 			"tovar_count" => "1",
		// 			"tovar_image" => "20231204155701Burger1.png",
		// 			"tovar_price" => 176
		// 		],
		// 	]),
		// 	'price' => 149,
		// 	'status' => "Отменен",
		// 	'restourant' => 1,
		// ];
		

		// Orders::factory(1)->create($order);
		// Orders::factory(1)->create($order2);
		// Orders::factory(1)->create($order3);
		// Orders::factory(1)->create($order4);
		// Orders::factory(1)->create($order5);


		// Promo::factory(6)->create();
		Promo::factory()->create([
			'name' => 'Купон 6535 в Chicken Burger',
			'description' => 'Твистер + Картофель Фри Стандартный по купону 6535',
		]);
		Promo::factory()->create([
			'name' => 'Купон 5782 в Chicken Burger',
			'description' => 'Шефбургер + Картофель Фри Стандартный + Соус Сырный по купону 5782',
		]);
		Promo::factory()->create([
			'name' => 'Купон 6885 в Chicken Burger',
			'description' => 'Шефбургер Джуниор + Наггетсы + Соус Кетчуп Томатный по купону 6885',
		]);
		Promo::factory()->create([
			'name' => 'Купон 5567 в Chicken Burger',
			'description' => 'Чикенмастер + Наггетсы + Соус Кетчуп Томатный + Соус Сырный по купону 5567',
		]);

		
    }
}
