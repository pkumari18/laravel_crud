<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
  protected $table = 'couriers';
  protected $fillable = [
    'from',
    'to', 
    'received_by', 
    'type', 
    'posted_by',
    'description'
  ];
}

