<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourierHandler extends Model
{
	protected $table ='couriers_handlers';
	protected $fillable = [
		'courier_id',
		'user_id'
		
	];
}
