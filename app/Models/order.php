<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function user()
	{
	      return $this->belongsTo('App\User','user_id', 'id');
	}

	public function order_detail() 
	{
	     return $this->hasMany('App\order_detail','order_id', 'id');
	}
}
