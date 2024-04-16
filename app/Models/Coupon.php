<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tovar;

class Coupon extends Model
{
    use HasFactory;
	protected $table = 'coupons';

	public function tovars()
	{
		return $this->belongsToMany(Tovar::class, 'coupon_tovars', 'coupon_id', 'tovar_id');
	}
}
