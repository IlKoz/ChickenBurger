<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Orders;

class UserController extends Controller
{
	public function index()
	{
		// Получаем текущего авторизованного пользователя
		$user = Auth::user();
	
		// Получаем заказы для текущего пользователя и переворачиваем коллекцию
		$orders = $user->orders->reverse();
	
		return view('user/profile', compact('orders'));
		
	}
}
