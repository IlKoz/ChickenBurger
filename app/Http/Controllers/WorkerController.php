<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\User;

class WorkerController extends Controller
{
    public function index()
	{
		

		// Получаем текущего пользователя
		$user = auth()->user()->id;

		// Получаем работника и его ресторан
		$worker = User::where('id', $user)->first();
		$restourantId = $worker->restourant_id;

		// Получаем заказы, связанные с рестораном работника и исключая те, у которых статус 'Выдан' или 'Отменен'
		$orders = Orders::where('restourant_id', $restourantId)
						->whereNotIn('status', ['Выдан', 'Отменен'])
						->get();

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
