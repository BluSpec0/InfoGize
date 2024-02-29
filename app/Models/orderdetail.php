<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    public function product()
	{
	      return $this->belongsTo('App\Models\product','product_id', 'id');
	}

	public function pesanan()
	{
	      return $this->belongsTo('App\Models\order','order_id', 'id');
    }
}
