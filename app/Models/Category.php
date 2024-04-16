<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tovar;

class Category extends Model
{
    use HasFactory;
	protected $table = 'categories'; 

	public function tovars()
	{
		return $this->hasMany(Tovar::class, 'category_id', 'id');
	}
}
