<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function create(Request $request)
	{
		$user = $request['user_id'];
		$tovars = $request['tovars'];
		$coupons = $request['coupons'];
		$price = $request['price'];
		$restourant = $request['restourant'];

		Orders::create([
			'user_id' => $user,
			'tovars' => $tovars,
			'coupons' => $coupons,
			'price' => $price,
			'restourant_id' => $restourant,
		]);

		session()->forget('user_cart');
		session()->forget('user_cart_coupons');

		return redirect()->back();
	}
}
