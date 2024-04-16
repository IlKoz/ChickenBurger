<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tovar;
use App\Models\Category;
use Carbon\Carbon;

class TovarsController extends Controller
{
	
    public function index()
	{
		 // Проверяем, является ли пользователь администратором
		// if (!(session()->has('user'))) {
		// 	return redirect()->back();
		// } elseif(session('user')['role'] !== 'admin'){
		// 	return redirect()->back();
		// };
		
		
		$tovar = Tovar::all();
		return view('admin/adminpanel', compact('tovar'));
	}
	
    public function create()
	{
		// if (!(session()->has('user'))) {
		// 	return redirect()->back();
		// } elseif(session('user')['role'] !== 'admin'){
		// 	return redirect()->back();
		// };
		$category = Category::all();
		return view('admin/dobavlenie', compact('category'));
	}

    public function store(Request $request)
	{
		$name = $request['name'];
        $description = $request['description'];
        $category = $request['category'];
        $price = $request['price'];

		$time = Carbon::now();
		$mytime = $time->format('YmdHis');
		$image = $request->file('image');
		$name_file = $mytime . $image->getClientOriginalName(); 
		$image->storeAs('public/tovarimages', $name_file);
        

		Tovar::create([
			'name' => $name,  
			'description' => $description,  
			'category_id' => $category,  
			'price' => $price,  
			'image' => $name_file,  
		]);

		return redirect()->back();

		// Tovar::create([
		// 	'name' => 'Чизбургер',  
		// 	'description' => 'Стрипсы из куриного филе оригинальные, Булочка Солнечная, Сыр плавленый ломтевой, Кетчуп томатный, Соус Горчичный, Лук репчатый, Огурцы маринованные',  
		// 	'category' => 'Бургер',  
		// 	'price' => '99',  
		// 	'image' => 'Burger1.png',  
		// ]);
	}

	public function edit(Tovar $tovar)
	{
		// if (!(session()->has('user'))) {
		// 	return redirect()->back();
		// } elseif(session('user')['role'] !== 'admin'){
		// 	return redirect()->back();
		// };
		$category = Category::all();
		return view('admin/edit', compact('tovar', 'category'));
	}

	public function update(Request $request, Tovar $tovar)
	{
		$name = $request['name'];
        $description = $request['description'];
        $category = $request['category'];
        $price = $request['price'];

		$time = Carbon::now();
		$mytime = $time->format('YmdHis');
		$image = $request->file('image');
		$name_file = $mytime . $image->getClientOriginalName(); 
		$image->storeAs('public/tovarimages', $name_file);
		$data = ([
			'name' => $name,  
			'description' => $description,  
			'category_id' => $category,  
			'price' => $price,  
			'image' => $name_file,  
		]);
		$tovar->update($data);
		return redirect('adminpanel');
	}

	public function destroy(Tovar $tovar)
	{
		$tovar->delete();
		return redirect('adminpanel');
	}
}
