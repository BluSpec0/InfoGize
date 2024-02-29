<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function pesanan_detail() 
	{
	     return $this->hasMany('App\Models\order_detail','product_id', 'id');
	}
}
