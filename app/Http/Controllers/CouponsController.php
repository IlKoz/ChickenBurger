<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponsController extends Controller
{
    public function index()
	{

		$coupon = Coupon::all();
		return view('main/coupons', compact('coupon'));
	}

    public function show(Coupon $coupon)
	{
		return view('main/couponsCard', compact('coupon'));
	}

	public function create(Request $request)
	{
		// Получаем данные из формы
		$couponId = $request['coupon_id'];
		$couponCount = $request['coupon_count'];
		$Coupon = Coupon::find($couponId);

		// Получаем текущую корзину из сессии
		$userCart = session()->get('user_cart_coupons', []);

		// Проверяем, существует ли товар с указанным $tovarId в корзине
		if (isset($userCart[$couponId])) {
			// Если товар существует, обновляем его количество
			$couponCountOld = $userCart[$couponId]['coupon_count'];
			$couponCount += $couponCountOld;

			// Обновляем данные товара в корзине
			$userCart[$couponId] = [
				"coupon_id" => $couponId,
				"coupon_name" => $Coupon->name,
				"coupon_image" => $Coupon->image,
				"coupon_description" => $Coupon->description,
				"coupon_count" => $couponCount,
				"coupon_price" => $Coupon->price * $couponCount,
			];
		} else {
			// Если товар не существует, добавляем его в корзину
			$userCart[$couponId] = [
				"coupon_id" => $couponId,
				"coupon_name" => $Coupon->name,
				"coupon_image" => $Coupon->image,
				"coupon_description" => $Coupon->description,
				"coupon_count" => $couponCount,
				"coupon_price" => $Coupon->price * $couponCount,
			];
		}

		// Сохраняем обновленные данные корзины в сессии
		session()->put('user_cart_coupons', $userCart);

		$cart = $couponId;

		// return redirect()->back();
		// return redirect()->back()->with('success', 'Купон успешно добавлен в корзину!');
		return redirect()->back()->with('scrollTo', $cart)->with('success', 'Товар успешно добавлен в корзину!');
			
	}

	public function delete(Request $request)
	{
		$couponId = $request['coupon_id']; // Замените на актуальный идентификатор товара
		$Coupon = Coupon::find($couponId);

		// Получаем текущую корзину из сессии
		$userCart = session()->get('user_cart_coupons', []);

		// Проверяем, существует ли купон с указанным $couponId в корзине
		if (isset($userCart[$couponId])) {
			// Проверяем, существует ли ключ 'coupon_count' для указанного купона
			if (isset($userCart[$couponId]['coupon_count'])) {
				// Уменьшаем количество купона на 1
				$userCart[$couponId]['coupon_count']--;

				// Проверяем, если количество купона стало меньше 1, удаляем купон из корзины
				if ($userCart[$couponId]['coupon_count'] < 1) {
					unset($userCart[$couponId]);
				} else {
					// Пересчитываем сумму товара в корзине
					$userCart[$couponId]['coupon_price'] = $Coupon->price * $userCart[$couponId]['coupon_count'];
				}

				// Сохраняем обновленные данные корзины в сессии
				session()->put('user_cart_coupons', $userCart);

				return redirect()->back()->with('success', 'Купон успешно уменьшен в корзине.');
			} else {
				// Если ключ 'coupon_count' отсутствует, вы можете добавить его с начальным значением
				$userCart[$couponId]['coupon_count'] = 1;

				// Сохраняем обновленные данные корзины в сессии
				session()->put('user_cart_coupons', $userCart);

				return redirect()->back()->with('success', 'Купон успешно добавлен в корзину.');
			}
} else {
    // Если купон не существует в корзине, можно вывести сообщение об ошибке
    return redirect()->back()->with('error', 'Купон с указанным идентификатором не найден в корзине.');
}
	}

	public function deleteAll(Request $request)
	{
		$couponId = $request['coupon_id']; // Замените на актуальный идентификатор товара

		// Получаем текущую корзину из сессии
		$userCart = session()->get('user_cart_coupons', []);

		// Проверяем, существует ли товар с указанным $tovarId в корзине
		if (isset($userCart[$couponId])) {
			// Удаляем товар из корзины
			unset($userCart[$couponId]);

			// Сохраняем обновленные данные корзины в сессии
			session()->put('user_cart_coupons', $userCart);

			return redirect()->back()->with('success', 'coupon успешно удален из корзины.');
		} else {
			// Если товар не существует в корзине, можно вывести сообщение об ошибке
			return redirect()->back()->with('error', 'coupon с указанным идентификатором не найден в корзине.');
		}
	}
}
