<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model

{
	protected $table = 'helpdesk_tickets';
	protected $fillable = ['issues','type','priority','description'];
}