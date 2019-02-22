<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class Helper
{
	// if (!function_exists('test')) {
	  public static function get_category_name_by_id($id)
	  {
	      return DB::table('category')->where('id', $id)->pluck('name')->first();
	  }
	// }
}