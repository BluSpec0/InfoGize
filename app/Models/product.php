<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name', 'harga', 'stok', 'nama', 'kodepart', 'kategori', 'lokasiparts', 'keterangan', 
        'rincian1', 'rincian2', 'rincian3', 'rincian4', 'rincian5', 'rincian6', 'rincian7', 'rincian8', 
        'product_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // Sesuaikan jika ada atribut yang ingin disembunyikan
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // Sesuaikan jika perlu melakukan casting untuk atribut tertentu
    ];

    public function pesanan_detail() 
	{
	     return $this->hasMany('App\Models\order_detail','product_id', 'id');
	}
}