<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_quantity extends Model
{
	protected $table ='item_quantities';
	protected $fillable = [
		'item_id',
		'location_id',
		'quantity'
	];
}

}
