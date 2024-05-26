<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Orders extends Model
{
    use HasFactory;
	protected $table = 'orders'; 
	protected $guarded = false;

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	public function restourant()
	{
		return $this->belongsTo(Restourants::class);
	}
}
