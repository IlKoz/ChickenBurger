<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class WorkerController extends Controller
{
    public function index()
	{
		// Получаем заказы, исключая те, у которых статус 'Выдан' или 'Отменен'
		// if (!(session()->has('user'))) {
		// 	return redirect()->back();
		// } elseif(session('user')['role'] !== 'worker'){
		// 	return redirect()->back();
		// };
		$orders = Orders::whereNotIn('status', ['Выдан', 'Отменен'])->get();

		return view('admin/workerpanel', compact('orders'));
	}

	public function update(Request $request, Orders $order)
	{
		$status = $request['status'];

		$data = ([
			'status' => $status, 
		]);
		$order->update($data);
		return redirect()->back();
	}
}
