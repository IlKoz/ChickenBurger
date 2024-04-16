<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Coupon;

class Tovar extends Model
{
    use HasFactory;
	protected $table = 'tovars'; 
	protected $guarded = false;

	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

	public function coupons()
	{
		return $this->belongsToMany(Coupon::class, 'tovar_coupon', 'tovar_id', 'coupon_id');
	}
}
