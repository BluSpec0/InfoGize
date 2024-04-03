<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    public $timestamps = false; // Menonaktifkan penggunaan kolom timestamp
    protected $fillable = ['name', 'email', 'message'];
}
