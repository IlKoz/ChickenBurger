<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tovar;
use App\Models\Category;
use App\Models\Promo;
use App\Models\Restourants;

class MainController extends Controller
{
    public function index()
	{
		$tovar = Tovar::all();
		$category = Category::all();
		return view('main/main', compact('tovar', 'category'));
	}

    public function show(Tovar $tovar)
	{
		return view('main/card', compact('tovar'));
	}

    public function coupons()
	{
		// $tovar = Tovar::all();
		return view('main/coupons');
	}
    public function company()
	{
		return view('main/company');
	}

    public function promo()
	{
		$promo = Promo::all();
		return view('main/promo', compact('promo'));
	}

    public function map()
	{
		$restourants = Restourants::all();
		return view('main/map', compact('restourants'));
	}
}
