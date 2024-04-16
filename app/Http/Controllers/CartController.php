<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tovar;

class CartController extends Controller
{
	public function show()
	{
		$totalPrice = $this->getTotalPrice();
		$totalPriceCoupons = $this->getTotalPriceCoupons();

		return view('user.cart', compact('totalPrice', 'totalPriceCoupons'));
	}

    public function create(Request $request)
	{
		// Получаем данные из формы
		$tovarId = $request['tovar_id'];
		$tovarCount = $request['tovar_count'];
		$Tovar = Tovar::find($tovarId);

		// Получаем текущую корзину из сессии
		$userCart = session()->get('user_cart', []);

		// Проверяем, существует ли товар с указанным $tovarId в корзине
		if (isset($userCart[$tovarId])) {
			// Если товар существует, обновляем его количество
			$tovarCountOld = $userCart[$tovarId]['tovar_count'];
			$tovarCount += $tovarCountOld;

			// Обновляем данные товара в корзине
			$userCart[$tovarId] = [
				"tovar_id" => $tovarId,
				"tovar_name" => $Tovar->name,
				"tovar_image" => $Tovar->image,
				"tovar_count" => $tovarCount,
				"tovar_price" => $Tovar->price * $tovarCount,
			];
		} else {
			// Если товар не существует, добавляем его в корзину
			$userCart[$tovarId] = [
				"tovar_id" => $tovarId,
				"tovar_name" => $Tovar->name,
				"tovar_image" => $Tovar->image,
				"tovar_count" => $tovarCount,
				"tovar_price" => $Tovar->price * $tovarCount,
			];
		}

		// Сохраняем обновленные данные корзины в сессии
		session()->put('user_cart', $userCart);

		$cart = $tovarId;

		// return redirect()->back()->with('scrollTo', $cart);
		return redirect()->back()->with('scrollTo', $cart)->with('success', 'Товар успешно добавлен в корзину!');
			
	}

	public function delete(Request $request)
	{
		$tovarId = $request['tovar_id']; // Замените на актуальный идентификатор товара
		$Tovar = Tovar::find($tovarId);

		// Получаем текущую корзину из сессии
		$userCart = session()->get('user_cart', []);

		// Проверяем, существует ли товар с указанным $tovarId в корзине
		if (isset($userCart[$tovarId])) {
			// Уменьшаем количество товара на 1
			$userCart[$tovarId]['tovar_count']--;
		
			// Проверяем, если количество товара стало меньше 1, удаляем товар из корзины
			if ($userCart[$tovarId]['tovar_count'] < 1) {
				unset($userCart[$tovarId]);
			} else {
				// Пересчитываем сумму товара в корзине
				$userCart[$tovarId]['tovar_price'] = $Tovar->price * $userCart[$tovarId]['tovar_count'];
			}

			// Обновляем данные корзины в сессии
			session()->put('user_cart', $userCart);

			// Проверяем, остались ли еще товары в корзине
			if (empty($userCart)) {
				// Если корзина пуста, удаляем сессию
				session()->forget('user_cart');
			}
		
			return redirect()->back()->with('success', 'Товар успешно уменьшен в корзине.');
		} else {
			// Если товар не существует в корзине, можно вывести сообщение об ошибке
			return redirect()->back()->with('error', 'Товар с указанным идентификатором не найден в корзине.');
		}
	}

	public function deleteAll(Request $request)
	{
		$tovarId = $request['tovar_id']; // Замените на актуальный идентификатор товара

		// Получаем текущую корзину из сессии
		$userCart = session()->get('user_cart', []);

		// Проверяем, существует ли товар с указанным $tovarId в корзине
		if (isset($userCart[$tovarId])) {
			// Удаляем товар из корзины
			unset($userCart[$tovarId]);

			// Сохраняем обновленные данные корзины в сессии
			session()->put('user_cart', $userCart);

			return redirect()->back()->with('success', 'Товар успешно удален из корзины.');
		} else {
			// Если товар не существует в корзине, можно вывести сообщение об ошибке
			return redirect()->back()->with('error', 'Товар с указанным идентификатором не найден в корзине.');
		}
	}

	public function getTotalPrice()
	{
		$userCart = session('user_cart', []);
		$totalPrice = 0;

		foreach ($userCart as $tovar) {
			$totalPrice += $tovar['tovar_price'];
		}

		return $totalPrice;
	}

	public function getTotalPriceCoupons()
	{
		$userCartCoupons = session('user_cart_coupons', []);
		$totalPriceCoupons = 0;

		foreach ($userCartCoupons as $coupon) {
			$totalPriceCoupons += $coupon['coupon_price'];
		}

		return $totalPriceCoupons;
	}
}
